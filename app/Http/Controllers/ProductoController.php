<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $config = \DB::table('configuraciones')
        ->first();

        $categorias = explode(",",$config->categorias);
        $marcas = explode(",",$config->marcas);
        $presentaciones = explode(",",$config->presentaciones);
        $productos = Producto::get();   
        return view ('admin.productos.index',compact('productos','categorias','marcas','presentaciones','config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         $config = \DB::table('configuraciones')
        ->first();

        $categorias = explode(",",$config->categorias);
        $marcas = explode(",",$config->marcas);
        $presentaciones = explode(",",$config->presentaciones);

        return view('admin.productos.create', compact('categorias','marcas','presentaciones','config'));
    }

     public function buscar(Request $request){
        //dd($request);
        $texto = $request->texto;
       
              
            $productos = Producto::FiltrarPorCodigo($texto)
                            ->FiltrarPorNombre($texto)
                            ->with('iva')
                            ->get();
         // dd($productos);                  
          return Response()->json([
            'productos' => $productos
        ]);
     
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        $producto = Producto::BuscarPorCodigo($request->codigo)->count();
        $nombre   = Producto::BuscarPorNombre($request->descripcion)->count();

         if ($nombre <> 0) {
             $notification = array(
                'message' => 'El producto con el nombre: '. $request->descripcion.' ya existe!',
                'alert-type' => 'error'
            );
                return \Redirect::back()->with($notification);   
        }elseif ($producto <> 0) {
             $notification = array(
                'message' => 'El producto con el codigo:'. $request->codigo.' ya existe!',
                'alert-type' => 'error'
            );
                return \Redirect::back()->with($notification);
        }else

        $config = \DB::table('configuraciones')
        ->first();
        //dd($config);

        try {
            
            $productos =new Producto();
            $productos->codigo_barra =$request->codigo;
            $productos->descripcion =$request->descripcion;
            //$productos->precio_costo =$request->precio_costo;
            $productos->precio_venta =$request->precio_venta;
            //$productos->precio_mayoreo =$request->precio_mayoreo;
            //$productos->stock_actual =$request->stock_actual;
            //$productos->stock_minimo =$request->stock_minimo;
            $productos->marca =$request->marca;
            $productos->categoria =$request->categoria;
            
            $productos->presentacion =$request->presentacion;
            //$productos->fecha_vencimiento =$request->fecha_vencimiento;
           
            $productos->user_id =\Auth::user()->id;
            $productos->status =$request->status;
            $productos->save();

            $productos->registrarCambioPrecio();

             if ($productos) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success');

            return \Redirect::back()->with($notification);


        }

        } catch (Exception $e) {
            dd($e); 
        }
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request, $producto_id)
    {
        
      

         $productos = Producto::find($producto_id);
         $cantidad = $request->stock_actual;

        // dd($productos->stock_actual + $request->stock_actual);

         if ($request->stock_actual < 0) {
              $productos->stock_actual = $productos->stock_actual + $request->stock_actual;
              $descripcion = "Retiro de stock: " . $request->stock_actual;
              $productos->save();

         }else
         {
              $productos->stock_actual += $request->stock_actual;
              $descripcion = "Aumento de stock: " . $request->stock_actual;
              $productos->save();
         }
         
      
           $productos->registrarCambioStock($cantidad, $descripcion,$productos); 
       
     


           if ($productos) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalle($producto_codigo){

        $config = \DB::table('configuraciones')
        ->first();

        //$categorias = explode(",",$config->categorias);
        $iva = explode(",",$config->iva);
        //$presentaciones = explode(",",$config->presentaciones);

        //dd($iva);

        $producto = Producto::BuscarPorCodigo($producto_codigo)->firstOrFail();
       // $familias_producto = FamiliaProducto::orderBy('nombre')->get();
        $movimientos = $producto->LineasProducto()->orderBy('fecha', 'desc')->get();
        $precios_historico = $producto->preciosHistorico();
        //$tasas_iva = TasaIva::all();
        //$sucursales = Sucursales::pluck('nombre','id');

        return view('admin.productos.detalle')->with(compact('producto', 'movimientos', 'precios_historico','config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $config = \DB::table('configuraciones')
        ->first();
        
        try {
            
            $productos =Producto::find($id);
            $productos->codigo_barra =$request->codigo;
            $productos->descripcion =$request->descripcion;
            $productos->precio_costo =$request->precio_costo;
            $productos->precio_venta =$request->precio_venta;
            $productos->precio_mayoreo =$request->precio_mayoreo;
            $productos->stock_actual =$request->stock_actual;
            $productos->stock_minimo =$request->stock_minimo;
            $productos->marca =$request->marca;
            $productos->categoria =$request->categoria;
            
            
            $productos->presentacion =$request->presentacion;
            $productos->fecha_vencimiento =$request->fecha_vencimiento;
            
            $productos->user_id =\Auth::user()->id;
            //$productos->organismo_id =\Auth::user()->organismo_id;
            $productos->status =$request->status;
            $productos->save();

            $productos->registrarCambioPrecio();


             if ($productos) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success');

            return \Redirect::back()->with($notification);


        }

        } catch (Exception $e) {
            dd($e); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
