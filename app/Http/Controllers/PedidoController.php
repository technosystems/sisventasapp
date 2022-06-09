<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\EstadoPedido;
use App\Models\Caja;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\Servicio;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;
use Session; 
use App\facades\SistemaFactura;
use DB;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        
           $venta =Pedido::with('clientes')      
            ->orderBy('id','desc') 

            ->get();
            
                //dd($venta);
            $from = '2000-01-01';
            $to = $year . '-' . $month . '-' . $day;
        

        $config = DB::table('configuraciones')->first();

      

        return view('admin.pedidos.index',compact('from','to','venta','config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()
    {
       $pedidos = DB::table('pedidos')
        ->get();
       
        $config = DB::table('configuraciones')->first();
        $d_serie = $config->serie;
        $d_correlativo = $config->correlativo;

        if(count($pedidos) == 0){

            $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
            $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);
        }else{
            if($d_correlativo=='9999999'){
                $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
            }else{
                $pedidos = DB::table('pedidos')
                ->orderby('id','desc')
                ->first();
                $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad($pedidos->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);
            }
            
            
        }
 
       

        $productos = DB::table('productos')
        ->orderby('descripcion','asc')
        ->get();

        $servicios = DB::table('servicios')
        ->orderby('descripcion','asc')
        ->get();
    
         //dd($productos);


        
        $mytime = Carbon::now('America/Caracas');
        $fecha=$mytime->format('Y-m-d');

         $today = getdate();
        $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        //$config = \DB::table('configuraciones')->first();
        $current_month = $today['mon'];
        $current_year = $today['year'];
        $mes_actual =$data_month[$current_month - 1];
        //dd($mes_actual);

        $nombre_dia = date('w');
        switch($nombre_dia)
        {
            case 1: $nombre_dia="Lunes";
            break;
            case 2: $nombre_dia="Martes";
            break;
            case 3: $nombre_dia="Miercoles";
            break;
            case 4: $nombre_dia="Jueves";
            break;
            case 5: $nombre_dia="Viernes";
            break;
            case 6: $nombre_dia="Sabado";
            break;
        }
        //dd($nombre_dia);    
    
        return view('admin.pedidos.create',compact('servicios','serie','correlativo','productos','config','fecha',
            'mes_actual',
            'nombre_dia'));
    


    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
           //dd($request);

       
            $today = getdate();
            $hora = new DateTime("now", new DateTimeZone('America/Caracas'));
            $config = \DB::table('configuraciones')
            ->first();

            $articulos = json_decode($request->listadoArticulos);
            $cliente = \App\Models\Cliente::find($request->customer_id);


            $codigo = mt_rand(1,300855);
            $pedido = new Pedido();
            //$pedido->razon_social = $cliente->nombre;
            $pedido->tipo_pedido = $request->get('tipo_pedido');
            $pedido->serie = $codigo;
            $pedido->idcliente = $request->get('customer_id');
            $pedido->user_id = auth()->user()->id;
            $pedido->mes = $today['mon'];
            $pedido->year = $today['year'];
            $mytime = Carbon::now('America/Caracas');
            //$pedido->fecha = $mytime->format('Y-m-d');
            $pedido->hora = $hora->format('H:i:s');
            $pedido->estado = 1;//Procesado
            $pedido->fecha_registro = $request->fecha_registro; 
            $pedido->fecha_entrega = $request->fecha_entrega; 
            $pedido->materiales = $request->materiales;
            $pedido->tamano = $request->tamano;
            $pedido->colores = $request->colores;
            $pedido->descripcion = $request->descripcion;
            $pedido->correlativo = str_pad($request->get('correlativo'),7,'0',STR_PAD_LEFT);
            $pedido->save();

        

            for ($i=0; $i < count($articulos); $i++) {
             $producto = Producto::BuscarPorCodigo($articulos[$i]->codigo)->first();
             $linea = $articulos[$i];
           

                $detalle = new DetallePedido;
                $detalle->idproducto=$producto->id;
                $detalle->precio_pedido= $linea->precio;
                $detalle->fecha= date('Y-m-d');
                $detalle->cantidad= $linea->cantidad;
                $detalle->pedido_id=$pedido->id;
                $detalle->idcliente = $request->get('customer_id');
                $detalle->total_pagar = $detalle->precio_venta * $detalle->cantidad; 
                $detalle->usuario_id = auth()->user()->id;
                $detalle->save();
                
                $detalle->total_pagar = 0;
                $detalle->total_pagar += $detalle->precio_pedido * $detalle->cantidad;
                $detalle->save();

               

            };

            $historial = new EstadoPedido();
            $historial->pedido_id = $pedido->id;
            $historial->usuario_id = \Auth::id();
            $historial->fecha = date('Y-m-d');
            $historial->descripcion = 'El pedio ha sido generado desde el sistema.';
            $historial->save();

             $notification = array(
            'message' => '¡Pedido registrado satisfactoriamente!',
            'alert-type' => 'success');      
            return \Redirect::to('admin/pedido')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
