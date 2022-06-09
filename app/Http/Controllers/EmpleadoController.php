<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\BonoEmpleado;
use App\Models\DeduccionEmpleado;
use App\Models\Configuraciones;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::with('departamento')
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('admin.empleados.index', ['empleados' => $empleados]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
       return view('admin.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        

          $validated = $request->validate([

        'name'=>'required',
        'lastname'=>'required',
        'email'=>'required', 
        'telefono'=>'required',
        'fecha_nacimiento'=>'required',
        'lugar_nacimiento'=>'required',
        'tipo_documento'=>'required',
        'documento'=>'required|unique:empleados',
        'direccion'=>'required',
        'edad'=>'required',
        'status'=>'required',
        'genero_id'=>'required',
        'estado_civil_id'=>'required',
        'nacionalidad_id'=>'required',
        'tipo_sangre_id'=>'required',
        'pais_id'=>'required',
        'grado_instruccion_id'=>'required',
        'estado_id'=>'required',
        'municipio_id'=>'required',
        'parroquia_id'=>'required',
        'tipo_empleado_id'=>'required',
        'sueldo_base'=>'required',
        ]);

        $empleado = new Empleado();
        $empleado->name = $request->name;
        $empleado->lastname = $request->lastname;
        $empleado->email = $request->email;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        $empleado->telefono = $request->telefono;
        $empleado->lugar_nacimiento = $request->lugar_nacimiento;
        $empleado->tipo_documento = $request->tipo_documento;
        $empleado->documento = $request->documento;
        $empleado->direccion = $request->direccion;
        $empleado->edad = $request->edad;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->status = $request->status;
        $empleado->genero_id = $request->genero_id;
        $empleado->estado_civil_id = $request->estado_civil_id;
        $empleado->nacionalidad_id = $request->nacionalidad_id;
        $empleado->tipo_sangre_id = $request->tipo_sangre_id;
        $empleado->pais_id = $request->pais_id;
        $empleado->grado_instruccion_id = $request->grado_instruccion_id;
        //$empleado->sociedad_id = $request->sociedad_id;
        $empleado->estado_id = $request->estado_id;
        $empleado->municipio_id = $request->municipio_id;
        $empleado->parroquia_id = $request->parroquia_id;
        $empleado->tipo_empleado_id = $request->tipo_empleado_id;
        $empleado->sueldo_base = $request->sueldo_base;

        $empleado->save();

       $notification = array(
                    'message' => '¡Datos ingresados!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
       
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($empleado)
    {
        
        $empleado = Empleado::find($empleado);
        $fecha = "04/07/2018";
        
        $pdf= app('Fpdf');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        $pdf->Image('images/logo/logo1.jpg',10,5,40,25,'JPG');
        $pdf-> SetFillColor(234, 231, 230);
        $pdf->SetY(10);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetXY(150,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(60,5,utf8_decode("Fecha: ".date("d/m/Y")),0,1,'L');
        $pdf->SetXY(150,15);

        $confg = Configuraciones::first();

         $pdf->Ln(1);
         $pdf->SetXY(48,30);
         $pdf->SetFont('Arial','B',16);
         $pdf->Cell(128,5,utf8_decode("Planilla del empleado." ),0,1,'C');

          //titulos encabezado
         $pdf->SetXY(10, 40);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DATOS DE LA EMPRESA"),1,1,'C',true);
         $pdf->SetXY(10, 45);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(80,5,utf8_decode("NOMBRE DE LA ORGANIZACIÓN:"),1,1,'L');
         $pdf->SetXY(90, 45);
         $pdf->Cell(30,5,utf8_decode("R.I.F:"),1,1,'L');
         $pdf->SetXY(120, 45);
         $pdf->Cell(80,5,utf8_decode("SEDE CENTRAL:"),1,1,'L');

          // datos del encabezado
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 50);
         $pdf->Cell(80,5,utf8_decode($confg->titulo),1,1,'C');
         $pdf->SetXY(90, 50);
         $pdf->Cell(30,5,utf8_decode("V-25212293-8"),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(80,5,utf8_decode("CARACAS-VENEZUELA"),1,1,'C');

         //titulos
         $pdf->SetXY(10, 55);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DATOS PERSONALES DEL EMPLEADO"),1,1,'C',true);
         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 60);
         $pdf->Cell(40,5,utf8_decode("CEDULA:"),1,1,'L');
         $pdf->SetXY(50, 60);
         $pdf->Cell(70,5,utf8_decode("NOMBRES:"),1,1,'L');
         $pdf->SetXY(120, 60);
         $pdf->Cell(80,5,utf8_decode("APELLIDO:"),1,1,'L');

         //datos******************
         $pdf->SetFont('Arial','',7);
         $pdf->SetXY(10, 65);
         $pdf->Cell(40,5,$empleado->document,1,1,'C');
         $pdf->SetXY(50, 65);
         $pdf->Cell(70,5,$empleado->name,1,1,'C');
         $pdf->SetXY(120, 65);
         $pdf->Cell(80,5,utf8_decode($empleado->lastname),1,1,'C');

         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 70);
         $pdf->Cell(40,5,utf8_decode("FECHA DE NACIMIENTO:"),1,1,'C');
         $pdf->SetXY(50, 70);
         $pdf->Cell(40,5,utf8_decode("LUGAR DE NACIMIENTO:"),1,1,'C');
         $pdf->SetXY(90, 70);
         $pdf->Cell(30,5,utf8_decode("NACIONALIDAD:"),1,1,'C');
         $pdf->SetXY(120, 70);
         $pdf->Cell(30,5,utf8_decode("GENERO:"),1,1,'C');
         $pdf->SetXY(150, 70);
         $pdf->Cell(50,5,utf8_decode("EDAD:"),1,1,'C');

         //datos ***************************************************************************
         $pdf->SetFont('Arial','',7);
         $pdf->MultiCell(40,10,'18/05/1994',1,'C');  

         $pdf->SetXY(50, 75);
         $pdf->MultiCell(40,10,'Venezuela',1,'C'); 

         $pdf->SetXY(90, 75);
         $pdf->MultiCell(30,10,'Venezolano',1,'C');

         $pdf->SetXY(120, 75);
         $pdf->MultiCell(30,10,'Masculino',1,'C'); 

         $pdf->SetXY(150, 75);
         $pdf->MultiCell(50,10,'27',1,'C');

         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 85);
         $pdf->Cell(80,5,utf8_decode("CORREO:"),1,1,'C');
         $pdf->SetXY(90, 85);
         $pdf->Cell(30,5,utf8_decode("TELEFONO:"),1,1,'C');
         $pdf->SetXY(120, 85);
         $pdf->Cell(30,5,utf8_decode("GRADO DE INSTRUCCION:"),1,1,'C');
         $pdf->SetXY(150, 85);
         $pdf->Cell(50,5,utf8_decode("OCUPACIÓN:"),1,1,'C');

          //datos ***************************************************************************
         $pdf->SetFont('Arial','',7);
         $pdf->MultiCell(80,10,$empleado->email,1,'C'); 

         $pdf->SetXY(50, 90);
        //$pdf->MultiCell(40,10,$pastor->tx_direccion.", ".$pastor->empEstado->nb_estado,1,'C');  

         $pdf->SetXY(90, 90);
         $pdf->MultiCell(30,10,$empleado->phone_number,1,'C');  

         $pdf->SetXY(120, 90);
         $pdf->MultiCell(30,10,'TSU',1,'C');  

         $pdf->SetXY(150, 90);
         $pdf->MultiCell(50,10,'Programador',1,'C'); 


         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 100);
         $pdf->Cell(190,5,utf8_decode("DIRECCION:"),1,1,'C');
         $pdf->SetFont('Arial','',7);
         $pdf->MultiCell(190,10,$empleado->address,1,'C'); 




         //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('admin.empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $empleado)
    {
            //dd($request);

                $empleado = Empleado::find($empleado);
                $empleado->name = $request->name;
                $empleado->lastname = $request->lastname;
                $empleado->email = $request->email;
                $empleado->fecha_ingreso = $request->fecha_ingreso;
                $empleado->telefono = $request->telefono;
                $empleado->lugar_nacimiento = $request->lugar_nacimiento;
                $empleado->tipo_documento = $request->tipo_documento;
                $empleado->documento = $request->documento;
                $empleado->direccion = $request->direccion;
                $empleado->edad = $request->edad;
                $empleado->fecha_nacimiento = $request->fecha_nacimiento;
                $empleado->status = $request->status;
                $empleado->genero_id = $request->genero_id;
                $empleado->estado_civil_id = $request->estado_civil_id;
                $empleado->nacionalidad_id = $request->nacionalidad_id;
                $empleado->tipo_sangre_id = $request->tipo_sangre_id;
                $empleado->pais_id = $request->pais_id;
                $empleado->grado_instruccion_id = $request->grado_instruccion_id;
                //$empleado->sociedad_id = $request->sociedad_id;
                $empleado->estado_id = $request->estado_id;
                $empleado->municipio_id = $request->municipio_id;
                $empleado->parroquia_id = $request->parroquia_id;
                $empleado->tipo_empleado_id = $request->tipo_empleado_id;
                $empleado->sueldo_base = $request->sueldo_base;
                $empleado->save();

                $notification = array(
                    'message' => '¡Datos ingresados!',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function bonificacion(Request $request, $id)
    {
           
       $empleado = BonoEmpleado::where('empleado_id', $id)->first();
    
       if ($empleado)
        {
            $empleado->descripcion_bono = $request->descripcion_bono;
            $empleado->empleado_id = $id;
            $empleado->user_id = \Auth::id();
            $empleado->tiempo_bonificacion = $request->tiempo_bonificacion;
            $empleado->fecha_emision = $request->fecha_emision;
            $empleado->cantidad = $request->cantidad;
            $empleado->status = $request->status;
            $empleado->fecha_emision = date('Y-m-d') ;
            $empleado->save();
            
             $notification = array(
         'message' => '¡Datos actualizados!','alert-type' => 'success');
        return redirect()->to('admin/empleados')->with($notification);
        }
        


        $bonificacion = new BonoEmpleado();

        $bonificacion->descripcion_bono = $request->descripcion_bono;
        $bonificacion->empleado_id = $id;
        $bonificacion->user_id = \Auth::id();

        if ( $request->tiempo_bonificacion  == 0 ) 
        {
            $bonificacion->tiempo_bonificacion = 'Indefinido';
        }
        else
        {
             $bonificacion->tiempo_bonificacion = 'Eventual';
        }


        if ( $request->moneda  == 0 ) 
        {
            $bonificacion->moneda = '$';
        }
        else
        {
             $bonificacion->moneda = 'Bs';
        }

        $bonificacion->fecha_emision = date('Y-m-d');
        $bonificacion->cantidad = $request->cantidad;
        $bonificacion->status = $request->status;
        $bonificacion->save();


         $notification = array(
         'message' => '¡Datos ingresados!','alert-type' => 'success');
        return redirect()->to('admin/empleados')->with($notification);


    }
 

    public function detalle($id)
    {
       
       $empleado = Empleado::find($id);
       $bono = BonoEmpleado::where('empleado_id',$id)->first();

        $pdf= app('Fpdf');

        $pdf->AddPage();
       
        $pdf->Ln(1);

        $pdf->Image('images/logo/logo1.jpg',10,5,40,25,'JPG');
        $pdf-> SetFillColor(234, 231, 230);
        $pdf->SetY(10);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetXY(150,10);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(60,5,utf8_decode("Fecha: ".date("d/m/Y")),0,1,'L');
        $pdf->SetXY(150,15);

        $confg = Configuraciones::first();

         $pdf->Ln(1);
         $pdf->SetXY(48,30);
         $pdf->SetFont('Arial','B',16);
         $pdf->Cell(128,5,utf8_decode("Detalle de cálculos principales." ),0,1,'C');

         //titulos encabezado
         $pdf->SetXY(10, 40);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DATOS DE LA EMPRESA"),1,1,'C',true);
         $pdf->SetXY(10, 45);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(80,5,utf8_decode("NOMBRE DE LA ORGANIZACIÓN:"),1,1,'L');
         $pdf->SetXY(90, 45);
         $pdf->Cell(30,5,utf8_decode("R.I.F:"),1,1,'L');
         $pdf->SetXY(120, 45);
         $pdf->Cell(80,5,utf8_decode("SEDE CENTRAL:"),1,1,'L');

          // datos del encabezado
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 50);
         $pdf->Cell(80,5,utf8_decode($confg->titulo),1,1,'C');
         $pdf->SetXY(90, 50);
         $pdf->Cell(30,5,utf8_decode("V-25212293-8"),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(80,5,utf8_decode("CARACAS-VENEZUELA"),1,1,'C');

         $ivss = $empleado->sueldo_base /30 * 7;


          //titulos
         $pdf->SetXY(10, 55);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DESGLOCE PRINCIPAL"),1,1,'C',true);
         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 60);
         $pdf->Cell(40,5,utf8_decode("Salario para IVSS:"),1,1,'L');
         $pdf->SetXY(50, 60);
         $pdf->Cell(40,5,utf8_decode("Salario Prest de Empleo:"),1,1,'L');
         $pdf->SetXY(120, 60);
         $pdf->Cell(80,5,utf8_decode("APELLIDO:"),1,1,'L');
         
         //datos******************
         $pdf->SetFont('Arial','',7);
         $pdf->SetXY(10, 65);
         $pdf->Cell(40,5, number_format($ivss ,2).' '.$confg->prefijo_moneda ,1,1,'C');
         $pdf->SetXY(50, 65);
         $pdf->Cell(40,5,number_format($ivss ,2).' '.$confg->prefijo_moneda,1,1,'C');





         //save file
        $headers=['Content-Type'=>'application/pdf'];
        return Response($pdf->Output(), 200, $headers);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function deduccion (Request $request, $id)
    {
           
      $deduccion = new  DeduccionEmpleado();
      $deduccion->descripcion_deduccion = $request->descripcion_deduccion;
      $deduccion->empleado_id = $id;
      $deduccion->user_id = \Auth::id();


     if ( $request->moneda  == 0 ) 
     {
         $deduccion->moneda = '$';
     }
     else
     {
        $deduccion->moneda = 'Bs';
     }

     $deduccion->fecha_emision = date('Y-m-d');
     $deduccion->cantidad = $request->cantidad;
     $deduccion->status = $request->status;
     $deduccion->save();

     $notification = array(
        'message' => '¡Deducción ingresada!','alert-type' => 'success'
       );
     return redirect()->to('admin/empleados')->with($notification);

    }
 

}
