<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\LineaOrdenServicio;
use App\Http\Requests\UpdatePermission;
use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Modelos;
use App\Models\TipoEquipo;
use App\Models\HistorialEquipo;
use App\Models\FotoEquipo;
use Validator;
use Carbon\Carbon;
use Crabbly\Fpdf\Fpdf;

class OrdenServicioController extends Controller
{
    
   public function index()
   {
    
      $today = getdate();
        $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $mes = $today['mon'];

        switch($mes)
        {
            case 1: $mes="Enero";
            break;
            case 2: $mes="Febrero";
            break;
            case 3: $mes="Marzo";
            break;
            case 4: $mes="Abril";
            break;
            case 5: $mes="Mayo";
            break;
            case 6: $mes="Junio";
            break;
            case 7: $mes="Julio";
            break;
            case 8: $mes="Agosto";
            break;
            case 9: $mes="Septiembre";
            break;
            case 10: $mes="Octubre";
            break;
            case 11: $mes="Noviembre";
            break;
             case 12: $mes="Diciembre";
            break;
        }

        
        $ordenes = OrdenServicio::orderBy('id','DESC') 
     ->get();
    // dd($ordenes);
     
     return view ('admin.ordenservicios.index', compact('ordenes','mes'));


   }

   public function clientes($id)
   {

     $cliente = Cliente::find($id);
     return $cliente;
   }

   public function marca($id)
   {

     $marca = Marca::get();

     $tequipo = TipoEquipo::find($id);


    return $marca; $tequipo;
   }

   public function modelos($id)
   {

     $modelo = Modelos::where('marca_id', $id)
     ->get();
    return $modelo;
   }

   public function guardar(Request $request)
   {
        //dd($request);

        $input = $request->all();
        $data = [];
        $data['tipo_reparacion'] = json_encode($input['tipo_reparacion']);

        $orden = new OrdenServicio();
          //dd($request->cliente_id);
         $orden->cliente_id            = $request->cliente_id;
         $orden->tipo_equipo_id        = $request->tipo_equipo_id;
         $orden->marca_id              = $request->marca_id;
         $orden->modelo_id             = $request->modelo_id;
         $orden->tipo_reparacion       = $data['tipo_reparacion'];
         $orden->orservacion_recepcion = $request->orservacion_recepcion;
         $orden->accesorios            = $request->accesorios;
         $orden->imei                  = $request->imei;
         $orden->color                 = $request->color;
         $orden->clave                 = $request->clave;
         $orden->costo                 = $request->costo;
         $orden->anticipo              = $request->anticipo;
         $orden->fecha_entrega         = $request->fecha_entrega;
         $orden->estado_servicio_id    = 1;
        // $orden->organismo_id          = \Auth::user()->organismo_id;
        // $orden->sucursal_id           = \Auth::user()->sucursal_id;
         $orden->user_id               = \Auth::user()->id;

         $orden->save();


         if ($orden) {
           
        $historial = new HistorialEquipo();

        $historial->orden_servicio_id = $orden->id;
        $historial->observacion_recepcion = $request->orservacion_recepcion;
        $historial->tipo_equipo_id = $request->tipo_equipo_id;
        $historial->cliente_id =$request->cliente_id;
        $historial->marca_id = $request->marca_id;
        $historial->modelo_id = $request->modelo_id;
        //$historial->organismo_id = \Auth::user()->organismo_id;
        //$historial->sucursal_id =\Auth::user()->sucursal_id;
        $historial->user_id                = \Auth::user()->id;

        $historial->save();

          $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
           );


          return \Redirect::to('/ordenservicios/imprimir/'.$orden->id)->with($notification);


         }
         
      


   }

   public function editar(UpdatePermission $request ,$id)
   {
     
    

         $orden =OrdenServicio::find($id);
          //dd($request->cliente_id);
         $orden->orservacion_recepcion = $request->orservacion_recepcion;
         $orden->estado_servicio_id    = $request->tipo_equipo_id;
         //$orden->organismo_id          = \Auth::user()->organismo_id;
         //$orden->sucursal_id           = \Auth::user()->sucursal_id;
         $orden->user_id                = \Auth::user()->id;

         $orden->save();


         if ($orden) {


        $historial = new HistorialEquipo();
        
        $historial->orden_servicio_id = $orden->id;
        $historial->observacion_recepcion = $orden->orservacion_recepcion;
        $historial->tipo_equipo_id = $orden->tipo_equipo_id;
        $historial->cliente_id =$orden->cliente_id;
        $historial->marca_id = $orden->marca_id;
        $historial->modelo_id = $orden->modelo_id;
        //$historial->organismo_id = \Auth::user()->organismo_id;
        //$historial->sucursal_id =\Auth::user()->sucursal_id;
        $historial->user_id                = \Auth::user()->id;

        $historial->save();
           

          $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
           );
          return redirect()->back()->with($notification);


         }

   }



    public function imprimir($id)
   {

      $nombre_dia = Carbon::now()->dayOfWeek;

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

      $mes_fecha = date('m');

       switch($mes_fecha)
    {
     case 1: $mes_fecha="Enero";
     break;
     case 2: $mes_fecha="Febrero";
     break;
     case 3: $mes_fecha="Marzo";
     break;
     case 4:$mes_fecha="Abril";
     break;
     case 5: $mes_Fecha="Mayo";
     break;
     case 6: $mes_fecha="Junio";
     break;
     case 7: $mes_fecha="Julio";
     break;
     case 8: $mes_fecha="Agosto";
     break;
     case 9: $mes_fecha="Septiembre";
     break;
     case 10:$mes_fecha="Octubre";
     break;
     case 11:$mes_fecha="Noviembre";
     break;
     case 12:$mes_fecha="Diciembre";
     break;
    }






       $orden =OrdenServicio::find($id);



        $pdf = new Fpdf('P', 'mm', array(100,385));

        $pdf->AddPage();
        $pdf-> SetFillColor(142, 142, 142);
        $pdf->Image('images/logo/logo1.jpg',4,1,90,40,'JPG');
        //$pdf->SetTextColor(255,255,255);
        $pdf->SetXY(60,40);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(60,5,utf8_decode("HORA: ".date("H:m:s")),0,1,'L');
        $pdf->SetX(40);
        $pdf->Ln(6);
        $pdf->SetFont('helvetica','B',14);
        $pdf->Cell(80,8,utf8_decode("ORDEN N°: 0000000".$id),1,0,'C',true);
        $pdf->Ln(10);
        $pdf->SetFont('helvetica','B',8);
        $pdf->Cell(80,6,utf8_decode("=============================================="),0,0,'C');

        $pdf->Ln(6);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(80,6,utf8_decode("Fecha de Recepción"),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(80,6,utf8_decode($nombre_dia.', '.date('d').' de '.$mes_fecha.' de '.date('Y') ),0,0,'C');

        $pdf->Ln(9);
        $pdf->SetFont('helvetica','B',8);
        $pdf->Cell(80,6,utf8_decode("=============================================="),0,0,'C');

        $pdf->Ln(6);
        $pdf->SetY(90);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(40,5,utf8_decode("Cliente: ".$orden->cliente->name),0,1,'C');
        $pdf->Ln(1);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(58,5,utf8_decode("Dispositivo: ".$orden->marca->descripcion.' - '.$orden->modelo->descripcion),0,1,'C');
        $pdf->Ln(1);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(47,5,utf8_decode("N° de imei: ".$orden->imei),0,1,'C');

        $pdf->Ln(5);
        $pdf->SetFont('helvetica','B',8);
        $pdf->Cell(80,6,utf8_decode("=============================================="),0,0,'C');
       
        $pdf->Ln(6);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("Reparación"),0,0,'C');
        $pdf->Cell(97,8,utf8_decode("Importe"),0,0,'C');
        //explode(",",$orden->tipo_reparacion)
        $pdf->Ln(12);
        $pdf->SetFont('helvetica','B',10);
        
        $descripciones = explode(",",$orden->tipo_reparacion);

        foreach ($descripciones as $key => $value) {
         $pdf->Multicell(0,2,substr($value,1,18)."\n"."\n"."\n"."\n"); 
        }


        $pdf->Ln(6);
        $pdf->SetXY(40,160);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("SUB-TOTAL:"),0,0,'R');
        $pdf->Cell(30,8,number_format($orden->costo,2).'$',0,0,'R');
        $pdf->Ln(6);
        $pdf->SetXY(40,167);

        $anticipo = $orden->anticipo;

        $pdf->Cell(24,8,utf8_decode("ANTICIPO"),0,0,'R');
        if ($anticipo == 0) {
         $pdf->Cell(30,8,number_format($orden->anticipo,2).'$',0,0,'R');
        }else
        {
          $pdf->Cell(30,8,number_format($anticipo,2).'$',0,0,'R');
        }
        $pdf->SetXY(40,174);
        
        $pdf->Cell(24,8,utf8_decode("TOTAL"),0,0,'R');
        $pdf->Cell(30,8,number_format($orden->costo - $anticipo,2).'$',0,0,'R');

        if ($orden->clave == 'Patrón') {
          $pdf->Image('images/patron/patron.jpg',20,182,60,40,'JPG');
        }elseif ($orden->clave == 'Contraseña') {
        $pdf->Ln(6);
        $pdf->SetXY(40,200);
         $pdf->Cell(24,8,utf8_decode("__________________________________________"),0,0,'C');
        $pdf->SetXY(45,205);
         $pdf->Cell(20,8,utf8_decode("Escriba la contraseña"),0,0,'C');
        }
            
        $pdf->Ln(6);
        $pdf->SetXY(40,225);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("Fecha aproximada de entrega:"),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetXY(40,230);
        $pdf->SetFont('helvetica','B',10);
        //dd($orden->fecha_entrega);
        $pdf->Cell(24,8,utf8_decode($orden->fecha_entrega),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetXY(40,235);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("Recibe:"),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetXY(40,240);
        $pdf->SetFont('helvetica','B',10);
        //dd($orden->fecha_entrega);
        $pdf->Cell(24,8,utf8_decode(\Auth::user()->display_name),0,0,'C');


  
        

        $pdf->Ln(12);
        $pdf->SetXY(40,255);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("Políticas de la Empresa"),0,0,'C');
        $pdf->Ln(6);
        $pdf->SetXY(10,265);
        $pdf->SetFont('helvetica','B',9);
        $pdf->Multicell(0,4,utf8_decode('Que es necesario expedir un Reglamento para el Servicio de Telefonía Móvil Celular, acorde con la Ley Reformatoria a la Ley Especial de Telecomunicaciones, publicada en el registro oficial N°. 770 de Agosto 30 de 1995; Que en el artículo 57 de la Ley Reformatoria a la Ley Especial de Telecomunicaciones, establece que la operación del servicio móvil automático se prestará mediante Operadores en las condiciones de Contrato de Concesión, la Ley y los Reglamentos establezcan, con los servicios finales que permita su red; que el artículo 41 ensus literales b), c) y d) del Reglamento General de la ley Especial de Telecomunicaciones reformada, le facultan al CONATEL establecer los reglamentos y dictar las normas que regulen los servicios de telecomunicaciones; y, En uso de las atribuciones que le confieren el artículo 10, artículo innumerado tercero, literal j) de la ley Reformatoria a la ley especial de Telecomunicaciones.')); 
       

        $pdf->Ln(1);
        $pdf->SetXY(40,350);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(24,8,utf8_decode("-Visítanos-"),0,0,'C');

        $pdf->Ln(1);
        $pdf->SetXY(40,355);
        $pdf->SetFont('helvetica','B',8);
        $pdf->Cell(24,8,utf8_decode("https://www.appservitec.com.mx"),0,0,'C');

      

        
        //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
   }



  public function historial($id)
   {

    $enero = 'Enero';
    $febrero = 'febrero';
    $marzo = 'marzo';
    $abril = 'abril';
    $mayo = 'mayo';
    $junio = 'junio';
    $julio = 'julio';
    $agosto = 'agosto';
    $septiembre = 'septiembre';
    $octubre = 'octubre';
    $noviembre = 'noviembre';
    $diciembre = 'diciembre';
 $ordenes = OrdenServicio::where('estado_servicio_id', '>', 5)
     ->get();
    if (date('m') == 01) {
      $mes = $enero;
    }elseif (date('m') == 02) {
      $mes = $febrero;
    } elseif (date('m') == 03) {
      $mes = $marzo;
    }elseif (date('m') == 04) {
      $mes = $abril;
    }elseif (date('m') == 05) {
      $mes = $mayo;
    }elseif (date('m') == 06) {
      $mes = $junio;
    }elseif (date('m') == 07) {
      $mes = $julio;
    }elseif (date('m') == 8) {
      $mes = $agosto;
    }elseif (date('m') == 9) {
      $mes = $septiembre;
    }elseif (date('m') == 10) {
      $mes = $octubre;
    }elseif (date('m') == 11) {
      $mes = $noviembre;
    }elseif (date('m') == 12) {
      $mes = $diciembre;
    }
    
    $historiales = HistorialEquipo::where('orden_servicio_id',$id)->get();
     
  
   
  
   
    return view('admin.ordenservicios.equipo.historial',compact('mes','historiales'));
   }


   public function nuevo()
   {

     $clientes = Cliente::orderBy('id', 'ASC')->get();
     return view('admin.ordenservicios.nuevo')->with('clientes', $clientes);
   }


    public function fotos($id)
   {

     $orden = FotoEquipo::where('orden_servicio_id',$id)
      ->selectRaw('foto_equipos.orden_servicio_id, count(*) as foto')
      ->first();
     $ordenes = OrdenServicio::find($id);
     $fotos = FotoEquipo::where('orden_servicio_id',$id)->get();
     return view ('admin.ordenservicios.fotos', compact('ordenes','fotos','orden'));
     
   }


   public function guardarfoto(Request $request ,$id)
   {

    $validator = Validator::make($request->all(), [
            'poster' => 'dimensions:min_width=100,min_height=200|max:5000',
        ]);

    $orden = FotoEquipo::where('orden_servicio_id',$id)
    ->selectRaw('foto_equipos.orden_servicio_id, count(*) as foto')
    ->first();

    //dd($orden->foto <> 0);
  
    if ($orden->foto <> 0) {
      
      $orden = FotoEquipo::where('orden_servicio_id',$id)
      ->selectRaw('foto_equipos.orden_servicio_id, count(*) as foto')
      ->first();
    }
     else {
      $orden->foto = 0;
     }

     //dd($orden->foto);
    if ($orden->foto == 5) {
      
      $notification = array(
            'message' => '¡No puede cargar mas de 5 imágenes por orden de servicio!',
            'alert-type' => 'error'
           );
     return redirect()->back()->with($notification);

    }

    $imgname = uniqid();
    $extension = $request->poster->extension();

    if($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg' || $extension == 'webp'){


        $fotos =new FotoEquipo();
        $imageName = $imgname.'.'.$request->poster->extension();  
        $request->poster->move(public_path('/images/equipos'), $imageName);
        $fotos->foto = $imageName;
        $fotos->orden_servicio_id = $id;
        $fotos->save();

        $notification = array(
            'message' => '¡Foto ingresada!',
            'alert-type' => 'success'
           );
          return redirect()->back()->with($notification);

    }
     
   }
}
