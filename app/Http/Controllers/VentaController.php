<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use DB;
use App\Models\Caja;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Recibo;

use App\Models\Producto;
use App\Models\DetalleVenta;
use App\Models\LineaProducto;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Mail;
use App\Mail\FacturaMail;
use Session; 
use App\facades\SistemaFactura;

class VentaController extends Controller
{
 
    public function registro(){

        $ventas = DB::table('venta')
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
                $venta = DB::table('venta')
                ->orderby('id','desc')
                ->first();
                $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad($venta->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);
            }
            
            
        }

        try {
            $caja = Caja::where([
                ['estado','=','Abierta']
            ])
            ->firstOrFail();
            //dd($caja);
        } catch (\Exception $e) {
            $notification = array(
            'message' => '¡Debes aperturar la caja antes de realizar una venta!',
            'alert-type' => 'error');      
            return redirect()->to('/admin/panel/abrir_caja')->with($notification);;
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
    
        return view('admin.ventas.registrar',compact('servicios','serie','correlativo','caja','productos','config','fecha',
'mes_actual',
'nombre_dia'));
    } 

    public function store(Request $request){
        //dd($request);

          $ventas_totales = DB::table('venta')
            ->get();

           



            $today = getdate();
            $hora = new DateTime("now", new DateTimeZone('America/Caracas'));


            $config = \DB::table('configuraciones')
            ->first();

            $articulos = json_decode($request->listadoArticulos);
            $cliente = Cliente::find($request->customer_id);
            //dd($request);
            $venta = new Venta();
            $venta->razon_social = $cliente->nombre;
            $venta->tipo_factura = $request->get('tipo_factura');
            $venta->serie = $request->get('serie');
            $venta->tipo_pago = $request->get('tipo_pago');
            $venta->nu_referencia = $request->get('referencia');
            $venta->nu_iva = 0;
            $venta->idcaja = $request->get('idcaja');
            $venta->idcliente = $request->get('customer_id');
            $venta->email = $cliente->mail;
            $venta->iduser = auth()->user()->id;
            $venta->mes = $today['mon'];
            $venta->year = $today['year'];
            $mytime = Carbon::now('America/Caracas');
            $venta->fecha = $mytime->format('Y-m-d');
            $venta->hora = $hora->format('H:i:s');
            $venta->estado = 'Procesado';
            $venta->correlativo = str_pad($request->get('correlativo'),7,'0',STR_PAD_LEFT);
            $venta->save();

            $idproducto=$request->get('idproducto');
            $precio_venta=$request->get('precio_venta');
            $cantidad=$request->get('cantidad');

           
          for ($i=0; $i < count($articulos); $i++) {
            $producto = Producto::BuscarPorCodigo($articulos[$i]->codigo)->first();
            $linea = $articulos[$i];

                $detalle = new DetalleVenta;
                $detalle->idproducto=$producto->id;
                $detalle->precio_venta= $linea->precio;
                $detalle->cantidad= $linea->cantidad;
                $detalle->idventa=$venta->id;
                $detalle->idcliente = $request->get('customer_id');
                $detalle->total_pagado = $detalle->precio_venta * $detalle->cantidad; 
                $detalle->save();

                
                $producto->save();
               
                $lineaProducto = new LineaProducto();
                $lineaProducto->comprobante()->associate($venta->id);
                $lineaProducto->productos()->associate($producto);
                $lineaProducto->usuario()->associate(\Auth::user());
                $lineaProducto->precioUnitario =$detalle->precio_venta;
                $lineaProducto->cantidad = $detalle->cantidad;
                $lineaProducto->subTotal = $detalle->precio_venta * $detalle->cantidad;
                $lineaProducto->iva = ($lineaProducto->subTotal * $config->iva) / 100;
                $lineaProducto->total = $lineaProducto->subTotal + $lineaProducto->iva;
                //$lineaProducto->empresa_id = auth()->user()->empresa_id;
                $lineaProducto->fecha = date("Y-m-d H:i:s");
                $lineaProducto->descripcion = "x $detalle->cantidad  $producto->descripcion  -  TOTAL $ $lineaProducto->total";



                $venta->descripcion = "x $detalle->cantidad   $producto->descripcion  -  TOTAL $ $lineaProducto->total";

                $venta->total = 0;

                $venta->total += $lineaProducto->total;   

                   $lineaProducto->save();
                   $producto->save();
                   $venta->save();


               
            }
                
            if ($request->tipo_factura == "Credito") 
            {
                $fecha_vencimiento = $request->fecha_vencimiento;
                $deuda_original = $lineaProducto->total;

                if($request->pago_inicial)
                    $deuda_actual = $lineaProducto->total - $request->pago_inicial;
                else
                    $deuda_actual = $lineaProducto->total;

                $plazo = $request->plazo;

                $factura = SistemaFactura::getInstancia()->ingresarFactura($venta, $fecha_vencimiento, $deuda_original, $deuda_actual, $plazo);               
               
            }

            $notification = array(
            'message' => '¡Venta registrada!',
            'alert-type' => 'success');      
            return \Redirect::back()->with($notification);
            
           
       
    }
   
    public function open_gistorial(Request $request){



        if (\Auth::user()->hasRole('Vendedor')) {
            
            return redirect('/admin/panel/venta/generar');
            # 
        } else {
            $from = $request->get('from');
        $to = $request->get('to');

        $month = date('m');
        $day = date('d');
        $year = date('Y');

        if($from && $to){
            $venta = DB('venta')
            ->whereBetween('fecha',$from)
            ->orderBy('id','desc')
            ->paginate(20);
        }else{
           $venta =Venta::with('clientes')      
            ->orderBy('id','desc') 

            ->get();
            
                //dd($venta);
            $from = '2000-01-01';
            $to = $year . '-' . $month . '-' . $day;
        }

        $config = DB::table('configuraciones')->first();

        if($request->ajax()){
            return response()->json(view('ventas.ajax',compact('from','to','venta','config'))->render());
        }

        return view('admin.ventas.historial',compact('from','to','venta','config'));
        }
        
    }

    public function factura($id){
        $venta = Venta::find($id);
        //dd($venta);


        $detalle= lineaProducto::where('venta_id',$id)
        ->get();
       
        

        $config = DB::table('configuraciones')->first();
        //dd($config);
        $factura = DB::table('factura')->first();

        $fecha = "04/07/2018";
        $pdf = new \Crabbly\Fpdf\Fpdf('P','mm',array(230,220));

        $pdf->AddPage();


       
        $pdf->Ln(1);
        
        //$pdf->Image('images/mmm.png',10,5,40,25,'PNG');
         $pdf->Ln(1);
         $pdf->SetY(20);
         $pdf-> SetFillColor(234, 231, 230);
       
         $pdf->Image('images/logo/6230aefd86ad0.png',10,1,90,50);
         $pdf->SetY(10);
         $pdf->SetFont('Arial','B',12);
        
         $pdf->Ln(1);
         $pdf->SetFont('Times','',10);
       

         $pdf->SetFont('Arial','B',9);
         $pdf->SetXY(45,4);
         $pdf->Cell(250,5,utf8_decode('N° DE CONTROL 00-'.$venta->correlativo),0,1,'C');

         $pdf->SetFont('Arial','B',12);
         $pdf->SetXY(45,35);
         $pdf->Cell(250,5,utf8_decode('Fecha: '.$venta->fecha),0,1,'C');
       
         $pdf->Ln(1);
         //titulos
         $pdf->SetXY(10, 70);
         $pdf->SetFont('Arial','B',9);
         $pdf->Cell(190,10,utf8_decode("DATOS PERSONALES DEL CLIENTE"),1,1,'C',true);
         $pdf->SetFont('Arial','B',8);
         $pdf->SetXY(10, 80);
         $pdf->Cell(60,10,utf8_decode("NOMBRE Y APELLIDO O RAZON SOCIAL:"),1,1,'C');
         $pdf->SetXY(70, 80);
         $pdf->Cell(50,10,utf8_decode("RIF, CI O PASAPORTE:"),1,1,'C');
         $pdf->SetXY(120, 80); 
         $pdf->Cell(80,10,utf8_decode("TELÉFONO:"),1,1,'C');
          //datos******************
         $pdf->SetFont('Arial','',10);
         $pdf->SetXY(10, 90);
        if ($venta->clientes->empresa == 1) {
         $pdf->Cell(60,10,utf8_decode($venta->clientes->nombre),1,1,'C');
         $pdf->SetXY(70, 90);
         $pdf->Cell(50,10,$venta->clientes->rif,1,1,'C');
         $pdf->SetXY(120, 90);
         $pdf->Cell(80,10,$venta->clientes->telefono,1,1,'C');
        }
        else
        { 
         $pdf->Cell(60,10,utf8_decode($venta->clientes->nombre .' '. $venta->clientes->apellido),1,1,'C');
         $pdf->SetXY(70, 90);
         $pdf->Cell(50,10,$venta->clientes->cedula,1,1,'C');
         $pdf->SetXY(120, 90);
         $pdf->Cell(80,10,$venta->clientes->telefono,1,1,'C');

         


        }
         $pdf->SetFont('Arial','B',8);
         $pdf->SetXY(10, 100);
         $pdf->Cell(190,10,utf8_decode("DATOS DE LA VENTA"),1,1,'C',true);
         $pdf->SetFont('Arial','B',9);
         $pdf->SetXY(10, 110);
         $pdf->Cell(60,10,utf8_decode("DESCRIPCIÓN:"),1,1,'C');
         $pdf->SetXY(70, 110);
         $pdf->Cell(20,10,utf8_decode("EXENTO:"),1,1,'C');
         $pdf->SetXY(90, 110);
         $pdf->Cell(20,10,utf8_decode("CANTIDAD:"),1,1,'C');
         $pdf->SetXY(110, 110);
         $pdf->Cell(50,10,utf8_decode("PRECIO UNITARIO:"),1,1,'C');
         $pdf->SetXY(160, 110);
         $pdf->Cell(40,10,utf8_decode("MONTO TOTAL:"),1,1,'C');
         //dd($detalle);
       
         $pdf->SetY(111);
         $pdf->SetFont('Arial','B',10);
         foreach ($detalle as $key => $value) {
        
         $pdf->Ln(10);
         $pdf->Cell(60,10,utf8_decode($value->productos->descripcion) ,1,0,'C');
         $pdf->Cell(20,10,utf8_decode('') ,1,0,'C');
         $pdf->Cell(20,10,utf8_decode($value->cantidad) ,1,0,'C');
         $pdf->Cell(50,10,utf8_decode($value->productos->precio_venta) ,1,0,'C');
         $pdf->Cell(40,10,utf8_decode($value->total) ,1,0,'C');

        }

        $iva   = 0;
        $total = 0;

        $iva   += ($value->cantidad * $value->productos->precio_venta * $config->iva) / 100; 
        $total += ($value->cantidad * $value->productos->precio_venta) + $iva;

        //dd($total);

        //dd($venta);
        $pdf->Ln(10);
        if ($venta->tipo_factura <> 'Credito') {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(100,10,utf8_decode('Tipo de venta: ' .$venta->tipo_factura ) ,1,0,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(50,10,utf8_decode('Total Excento (E) Bs. '),1,0,'C');
        $pdf->Cell(40,10,number_format('0',2),1,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(10);
        $pdf->Cell(100,10,utf8_decode('Tipo de pago: ' .$venta->tipo_pago.'     ' .'Referencia: '. $venta->nu_referencia ) ,1,0,'L');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(50,10,utf8_decode('IVA  '.$config->iva.'%'),1,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,10,number_format($iva,2),1,0,'C');
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(100,10,utf8_decode("Esta factura va sin Tachadura ni Enmienda") ,1,0,'C');
        $pdf->Cell(50,10,utf8_decode("Total a pagar") ,1,0,'C');
        $pdf->Cell(40,10,number_format($total,2),1,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->MultiCell(190,6,utf8_decode("Razón social: ASOC. COOP. PAPELES QUINTANA R.L.- RIF: J-31051570-0 - Telf: 0212-576-99-08 - Providencia SENIAT/01/01228 de fecha 28-08-2008 N° Control: desde el N° 00-000001 has el N° 00-000150 - Factura N° desde 000001 hasta 000150 - Fecha 25-03-2018 - Región Capital."),1,1,'L');
        }
        else
        {
        

        $facturas = DB::table('facturas')->where('venta_id', $id)->first();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(100,6,utf8_decode('Tipo de venta:  a ' .$venta->tipo_factura. ' a '.$facturas->plazo.' Días, vence el '.$facturas->fecha_vencimiento ) ,1,0,'L');
        $pdf->Ln(6);
        $pdf->Cell(100,5,utf8_decode("Esta factura va sin Tachadura ni Enmienda"),1,1,'L',true);

        foreach ($detalle as $key => $value) {
            $sql_infor1 = \DB::select(' select "recibos".*, "recibo_facturas"."factura_id" as "pivot_factura_id", "recibo_facturas"."recibo_id" as "pivot_recibo_id", "recibo_facturas"."deuda_inicial" as "pivot_deuda_inicial", "recibo_facturas"."deuda_final" as "pivot_deuda_final" from "recibos" inner join "recibo_facturas" on "recibos"."id" = "recibo_facturas"."recibo_id" where "recibo_facturas"."factura_id" =?',[$value->ventas->factura->id]);

            $pdf->Ln(5);
            $pdf->Cell(100,5,utf8_decode("Recibo de pago del cliente"),1,1,'L',true);

            $pdf->Cell(50,6,utf8_decode('Fecha') ,1,0,'C');
            $pdf->Cell(50,6,utf8_decode('Cantidad') ,1,0,'C');

             foreach ($sql_infor1 as $key => $value) {

                $pdf->Ln(6);
                $pdf->Cell(50,6,$value->fecha,1,0,'C');
                $pdf->Cell(50,6,number_format($value->monto,2,",","."),1,0,'C');
                
             }


          }
                
          
    }




        
         
        
        
       
         



       

        
        



         







          $headers=['Content-Type'=>'application/pdf'];
      return Response($pdf->Output(), 200, $headers);

       /* return view('ventas.factura', compact('venta','detalle','config','factura')); */
    }

    public function detalles($id){
        $venta =Venta::where('id','=',$id)
        ->first();

        $recibo = false;

       

        $detalle = DB::table('detalle_ventas as dv')
        ->join('productos as p','dv.idproducto','=','p.id')
        ->select('p.descripcion','dv.precio_venta','dv.cantidad')
        ->where('idventa','=',$id)
        ->get();

        $config = DB::table('configuraciones')->first();
        $factura = DB::table('factura')->first();
        //dd($factura);

        return view('admin.ventas.detalles', compact('venta','detalle','config','factura'));
    }

    public function enviar_correo($id){
        $venta = DB::table('venta')
        ->where('id','=',$id)
        ->first();

        $detalle = DB::table('detalleventa as dv')
        ->join('producto as p','dv.idproducto','=','p.id')
        ->select('p.titulo','dv.precio_venta','dv.cantidad','p.presentacion')
        ->where('idventa','=',$id)
        ->get();

        $config = DB::table('configuraciones')->first();
        $factura = DB::table('factura')->first();

        $email = trim($venta->{'email'});

        $subject = "Factura de venta";
        $for = $email;

        /* Mail::send('ventas.mail',compact('venta','detalle','config','factura'), function($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        }); */
       
        Mail::send('ventas.mail',compact('venta','detalle','config','factura'), function($msj) use($subject,$for,$config){
            $msj->from($config->{'email'},$config->{'titulo'});
            $msj->subject($subject);
            $msj->to($for);
        });
        Session::flash('success', 'Se envió el correo al correo del cliente con exito');
        return redirect()->back();
    
    }

    public function grafico(Request $request){
        $today = getdate();
        $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $current_month = $today['mon'];

        if(is_null($request->get('year'))){
            $current_year = $today['year'];
        }else{
            $current_year = $request->get('year');
        }

        $config = DB::table('configuraciones')->first();

        $caja_1 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))')) 
        ->where('mes','1')
        ->where('year',date('Y'))
        ->first();

        //dd($caja_1);

        $caja_2 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','2')
        ->where('year',date('Y'))
        ->first();



        $caja_3 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','3')
        ->where('year',date('Y'))
        ->first();

  
  
        $caja_4 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','4')
        ->where('year',date('Y'))
        ->first();

    

        $caja_5 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','5')
        ->where('year',date('Y'))
        ->first();

  

        $caja_6 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','6')
        ->where('year',date('Y'))
        ->first();



        $caja_7 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','7')
        ->where('year',date('Y'))
        ->first();


        $caja_8 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','8')
        ->where('year',date('Y'))
        ->first();


      
        $caja_9 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','9')
        ->where('year',date('Y'))
        ->first();


        $caja_10 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','10')
        ->where('year',date('Y'))
        ->first();



        $caja_11 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','11')
        ->where('year',date('Y'))
        ->first();


        $caja_12 = DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->where('mes','12')
        ->where('year',date('Y'))
        ->first();

        $venta_pro = DB::table('venta')
        ->where('estado','Procesado')
        ->where('year',date('Y'))
        ->get();

        $venta_can = DB::table('venta')
         ->where('estado','Cancelado')
        ->where('year',date('Y'))
        ->get();

        $venta_total =DB::table('venta')
        ->select(DB::raw('sum(cast(total as double precision))'))
        ->first();

        return view('admin.ventas.grafico',compact('caja_1','caja_2','caja_3','caja_4','caja_5','caja_6','caja_7','caja_8','caja_9','caja_10','caja_11','caja_12','current_year','config','venta_pro','venta_can','venta_total'));
    }

    public function cancelar_venta($id){
        try {
            $venta = Venta::findOrFail($id);
            $venta->estado = 'Cancelado';
            $venta->update();

            $detalles = DB::table('detalleventa')
            ->where('idventa','=',$id)
            ->get();
            
            foreach ($detalles as $key => $item) {
                $producto = Producto::findOrFail($item->idproducto);
                $producto->cantidad = $producto->cantidad + $item->cantidad;
                $producto->update();
            }

            Session::flash('success', 'Se se cancelo la venta con exito');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::flash('danger', 'Ocurrió un error en la cancelación, vuelva a intentar.');
            return redirect()->back();
        }

    }

        public function vencimientos(Request $request){
        $fecha = $request->fecha;
        $fecha_fin = $request->fecha_fin;   
        $cliente_id = $request->cliente_id;

        $vencimientos = Factura::where('facturas.id','>','0');
       
        if($cliente_id != null){
            $vencimientos->filtrarPorCliente($cliente_id, 'and');
        }
        if($fecha){
            $vencimientos->filtrarPorFecha($request->fecha, 'and');         
        }
        if(!$request->mostrar_facturas_pagas){
            $vencimientos = $vencimientos->where('deuda_actual', '>', 0, 'and');
        }
        if($request->ocultar_facturas_vencidas){
            $vencimientos = $vencimientos->where('fecha_vencimiento', '>', date('Y-m-d'), 'and');
        }
        
        $vencimientos = $vencimientos->orderby('fecha_vencimiento')
                        ->get();
        //dd($vencimientos->comprobante->clientes);
        return view('admin.facturas.vencimientos')->with(compact('vencimientos'));
    }


        public function nuevoRecibo($cliente_id){
        $cliente = Cliente::where('id', $cliente_id)->first();
    
        if($cliente){
            $facturas = Factura::buscarPorCliente($cliente->id)
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
            return view('admin.facturas.nuevo_recibo')->with(compact('cliente', 'facturas', 'total_atrasado', 'total_adeudado'));
        }else{
            $error = "No se encontró ningún cliente para el ID especificado.";
            return Redirect::to('/comprobantes/vencimientos')->with(compact('error'));
        }
    }



        public function guardarRecibo(Request $request){        
        $facturas = json_decode($request->facturas_seleccionadas);


        $usuario = \Auth::user();
        //$moneda = Moneda::find($request->moneda);
        $cliente = Cliente::find($request->cliente);
        
        $fecha = $request->fecha;
       // $cotizacion = $request->cotizacion;
        $monto = $request->monto;       

        try{
            $recibo = new Recibo();
            // Entidades asociadas
            //$recibo->moneda()->associate($moneda);      
            $recibo->usuario()->associate($usuario);        
            $recibo->cliente()->associate($cliente);
            
            $recibo->fecha = date("Y-m-d H:i:s");
            $recibo->monto = $monto;
            
           
            
            // Auxiliar para ir cancelando las facturas
            $saldo_aux = $recibo->monto;            
            // factura_id, deuda_actual, a_pagar, saldo_final
            for ($i=0; $i < count($facturas); $i++) {               
                if($saldo_aux > 0){
                    $factura = Factura::find($facturas[$i]->factura_id);
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
            return \Redirect::to('/admin/recibos/nuevo/'.$cliente->id)->with(compact('mensaje'));
        } catch ( \Illuminate\Database\QueryException $e) {
            dd($e);
            return \Redirect::back();
        }
    }






    public function ganancia()
    {
         $punto = 0;
        $efectivo = 0;
        $dolar = 0;
        $transf = 0;
        $pagom = 0;

        return view('admin.ventas.ganancias',compact('punto',
                                                      'efectivo',
                                                      'dolar',
                                                      'transf',
                                                      'pagom'));
    }

   public function ganancias(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $punto = 0;
        $efectivo = 0;
        $dolar = 0;
        $transf = 0;
        $pagom = 0;




         $punto = DB::table('venta')
            ->where('fecha',$from)
            ->where('tipo_pago','Punto de venta')
            ->orderBy('id','desc')
            ->sum('total');

         $efectivo = DB::table('venta')
            ->where('fecha',$from)
            ->where('tipo_pago','Bolivares')
            ->orderBy('id','desc')
            ->sum('total');
            //->get();
         
         $dolar = DB::table('venta')
            ->where('fecha',$from)
            ->where('tipo_pago','Dolares')
            ->orderBy('id','desc')
            ->sum('total');

         $transf = DB::table('venta')
            ->where('fecha',$from)
            ->where('tipo_pago','Transferencia')
            ->orderBy('id','desc')
            ->sum('total');

          $pagom = DB::table('venta')
            ->where('fecha',$from)
            ->where('tipo_pago','Pago movil')
            ->orderBy('id','desc')
            ->sum('total');


         

         return view('admin.ventas.ganancias',compact('punto',
                                                      'efectivo',
                                                      'dolar',
                                                      'transf',
                                                      'pagom'));
    }
}
