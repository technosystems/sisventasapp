<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\FacturasCompras;
use App\Models\RecibosCompras;
use App\facades\SistemaFacturaCompra;
use Illuminate\Http\Request;
use DB;
use App\Models\DetalleCompra;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;
use Session; 

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $recent_purchase =Compra::orderBy('id', 'desc')
                ->where('user_id', \Auth::id())->get();


       return view('admin.compras.index',compact('recent_purchase'));
    }


     public function clienteslistado()
    {
       $clientes =Cliente::get();

       return $clientes; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(){

        $ventas = DB::table('compras')
        ->get();
        
        $config = DB::table('configuraciones')->first();
        $d_serie = $config->serie;
        $d_correlativo = $config->correlativo;

        if(count($ventas) == 0){

            $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
            $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);
        }else{
            if($d_correlativo=='9999999'){
                $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
            }else{
                $venta = DB::table('compras')
                ->orderby('id','desc')
                ->first();
                $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad($venta->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);
            }
            
            
        }

        try {
            
            //dd($caja);
        } catch (\Exception $e) {
            Session::flash('danger', 'El usuario aun no aperturó alguna caja este día');
            return redirect()->to('panel/abrir_caja');
        }

        $productos = DB::table('productos')
        ->orderby('descripcion','asc')
        ->get();
   


        
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
    
        return view('admin.compras.create',compact('serie','correlativo','productos','config','fecha',
'mes_actual',
'nombre_dia'));
    } 

   

      public function guardar(Request $request)
    {
        //dd($request);

            $today = getdate();
            $hora = new DateTime("now", new DateTimeZone('America/Caracas'));
           
            $articulos = json_decode($request->listadoArticulos);
            $proveedor = Proveedor::find($request->proveedor_id);
            

            $compra = new Compra();
            $compra->proveedor_id = $proveedor->id;
            $compra->tipo_factura = $request->get('tipo_factura');
            $compra->serie = $request->get('serie');
            //$compra->email = 'ejemplo@gmail.com';
            $compra->user_id = auth()->user()->id;
            $compra->mes = $today['mon'];
            $compra->year = $today['year'];
            $mytime = Carbon::now('America/Caracas');
            $compra->fecha = $mytime->format('Y-m-d');
            $compra->hora = $hora->format('H:i:s');
            $compra->estado_compra = $request->get('estado_compra');
            $compra->correlativo = str_pad($request->get('correlativo'),7,'0',STR_PAD_LEFT);
            $compra->descuento = $request->get('descuento');
            $compra->costo_envio = $request->get('costo_envio');

            $compra->save();

             for ($i=0; $i < count($articulos); $i++) {
                 $producto = Producto::BuscarPorCodigo($articulos[$i]->codigo)->first();
                 $linea = $articulos[$i];
                

                   $detalle = new DetalleCompra();
                   $detalle->comprobante()->associate($compra);
                   $detalle->producto()->associate($producto);

                   $producto->stock_actual += $linea->cantidad;


                   $detalle->cantidad = $linea->cantidad;
                   $detalle->proveedor_id = $compra->proveedor_id;
                   $detalle->total_pagado = $linea->precio * $linea->cantidad;

                   //$compra->subTotal = $linea->precio * $linea->cantidad;
                   //$compra->total = $linea->precio * $linea->cantidad;
                   $compra->cantidad = $linea->cantidad;

                  $detalle->save();
                  $producto->save();
                  $compra->save();

             }


              if($compra->tipo_factura == 'Credito'){

                $fecha_vencimiento = $request->fecha_vencimiento;
                $deuda_original = $compra->cantidad * $linea->precio;


                $proveedor_id = $proveedor->id;

              
                if($request->pago_inicial)
                {
                    $deuda_actual =  $linea->subTotal -  $request->pago_inicial;
                    //dd($deuda_actual);  
                }
                else
                    $deuda_actual = $linea->subTotal;

                $plazo = $request->plazo;
                
                $factura = SistemaFacturaCompra::getInstancia()->ingresarFactura($compra, $fecha_vencimiento, $deuda_original, $deuda_actual, $plazo, $proveedor_id);               
            }

               $notification = array(
                    'message' => '¡Datos ingresados!',
                    'alert-type' => 'success'
                     );      
                     return \Redirect::back()->with($notification);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function borrar($proveedor)
    {
        $cliente = Proveedor::find($proveedor);
        $cliente->delete();

         $notification = array(
            'message' => '¡Datos eliminados!',
            'alert-type' => 'success'
        );
        
    
        
              return redirect()->back()->with($notification); 


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$proveedor)
    {
        $proveedor = Proveedor::find($proveedor);
        $proveedor->company_name =$request->company_name;
        $proveedor->vat_number =$request->vat_number;
        $proveedor->email =$request->email;
        $proveedor->phone_number =$request->phone_number;
        $proveedor->rif_number =$request->rif_number;
        $proveedor->address =$request->address;
        $proveedor->status =$request->status;
        $proveedor->save();

        
         $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function detalle(Request $request, $compra_id)
        {
            $compra = Compra::with('detalle')->find($compra_id);
            //dd($compra);
            
            return view('admin.compras.detalle')->with(compact('compra'));
        }


    function pagar (Request $request)
        {
          
                $fecha = $request->fecha;
                $fecha_fin = $request->fecha_fin;   
                $cliente_id = $request->cliente_id;

        
                $vencimientos = FacturasCompras::where('facturas_compras.id','>','0')->get();
               
                
               
               
                // dd($vencimientos);
                        
                return view('admin.facturas.compras')->with(compact('vencimientos'));
           
        }




        public function nuevoRecibo($proveedor_id){

        $proveedor = Proveedor::where('id', $proveedor_id)->first();
        //dd($proveedor);
    
        if($proveedor){
            $facturas = FacturasCompras::buscarPorProveedor($proveedor->id)
                    ->where('deuda_actual', '>', 0)
                    ->orderby('fecha_vencimiento')
                    ->get();                    
            $total_adeudado = 0;
            $total_atrasado = 0;
           

            for ($i=0; $i < sizeof($facturas) ; $i++) {
                $total_adeudado += $facturas[$i]->deuda_actual;

                $hoy = time();
                $fecha_vencimiento = strtotime($facturas[$i]->fecha_vencimiento);
                $date_diff = $fecha_vencimiento - $hoy;
                $dias_restantes = round($date_diff / (60 * 60 * 24));

                if($dias_restantes < 0)
                    $total_atrasado += $facturas[$i]->deuda_actual;
            }
            return view('admin.facturas.nuevo_recibo_factura')->with(compact('proveedor', 'facturas', 'total_atrasado', 'total_adeudado'));
        }else{
            $error = "No se encontró ningún cliente para el ID especificado.";
            return Redirect::to('/comprobantes/vencimientos')->with(compact('error'));
        }
    }


      public function guardarRecibo(Request $request){        
        $facturas = json_decode($request->facturas_seleccionadas);
       

        $usuario = \Auth::user();
        //$moneda = Moneda::find($request->moneda);
        $proveedor = Proveedor::find($request->proveedor);
        


        $fecha = $request->fecha;
       // $cotizacion = $request->cotizacion;
        $monto = $request->monto;       

        try{
            $recibo = new RecibosCompras();
            // Entidades asociadas
            //$recibo->moneda()->associate($moneda);      
            $recibo->usuario()->associate($usuario);        
            $recibo->proveedor()->associate($proveedor);
            $recibo->fecha = date("Y-m-d H:i:s");
            $recibo->monto = $monto;
            
           
            
            // Auxiliar para ir cancelando las facturas
            $saldo_aux = $recibo->monto;            
            // factura_id, deuda_actual, a_pagar, saldo_final
            for ($i=0; $i < count($facturas); $i++) {               
                if($saldo_aux > 0){
                    $factura = FacturasCompras::find($facturas[$i]->factura_id);
                    if($factura){
                        if($factura->deuda_actual > 0){
                            // PAGO PARCIAL O JUSTO
                            if($factura->deuda_actual >= $saldo_aux){
                                // variables temporales
                                $deuda_inicial = $factura->deuda_actual;
                                $deuda_final = round($factura->deuda_actual - $saldo_aux);
                                
                                // Asociamos recibo con todos sus datos a la factura.
                                $factura->recibos()->save($recibo, ['deuda_inicial' => $deuda_inicial, 'deuda_final' => $deuda_final]);

                                // Una vez hecho esto, actualizamos deuda de la factura
                                $factura->deuda_actual = $deuda_final;
                                
                                $factura->save();
                                $saldo_aux = 0;
                            // ESTOY PAGANDO DE MAS
                            }else{
                                // variables temporales
                                $deuda_inicial = $factura->deuda_actual;
                                $deuda_final = 0;                               

                                // Asociamos recibo con todos sus datos a la factura.
                                $factura->recibos()->save($recibo, ['deuda_inicial' => $deuda_inicial, 'deuda_final' => $deuda_final]);

                                // Restamos al saldo actual lo que pagamos
                                $saldo_aux -= $deuda_inicial;
                                $factura->deuda_actual = 0;
                                $factura->save();
                            }                           
                        }
                    }
                }               
            }
            $mensaje = "El recibo fue ingresado correctamente.";
            return \Redirect::to('/admin/recibos/factura/compra/nuevo/'.$proveedor->id)->with(compact('mensaje'));
        } catch ( \Illuminate\Database\QueryException $e) {
            dd($e);
            return \Redirect::back();
        }
    }
}
