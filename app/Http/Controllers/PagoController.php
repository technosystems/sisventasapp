<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\DetallePago;
use App\Models\Gastos;
use App\Models\Caja;
use App\Models\TipoGasto;
use App\Models\Empleado;
use App\Models\BonoEmpleado;
use App\Models\DeduccionEmpleado;
use Illuminate\Http\Request;
use App\Models\ConceptoNomina;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nomina()
    {
        
        $pagos = Pago::with('detalle','empleado')->get();
        //dd($pagos);
        return view('admin.pagos.index', compact('pagos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarnomina(Request $request)
    {
       //Se busca el empleado 
       $empleado = Empleado::find($request->empleado_id);


       $id = $empleado->id;
       //Se obtiene el sueldo base registrado
       $sueldo_base = $empleado->sueldo_base;

       //Se obtiene una bonificación registrada al empleado

       $bonificacion = BonoEmpleado::where('empleado_id', $id)->sum('cantidad');
       $bonificacion_emp = BonoEmpleado::where('empleado_id', $id)->get();
       $deduccion    = DeduccionEmpleado::where('empleado_id', $id)->sum('cantidad');

       $deduccion_emp = DeduccionEmpleado::where('empleado_id', $id)->get();
       

       /*
        
       // Bloque de sueldos extras aumentados al sueldo del empleado

        */

       $sueldo_quincenal          = $sueldo_base / 50;
       $horas_extras           = (($sueldo_base /30/8) * 150 / 100);
       $horas_nocturnas        = (($sueldo_base /30/8) * 130 / 100);
       $horas_extra_nocturnas  = (($sueldo_base /30/8) * 130 / 100) * 150 /100;
       $dias_feriados          = ($sueldo_quincenal * 150 /100);

       $sabadost            = 0;
       $domingost           = 0;
       $horasextra          = 0;
       $horanocturna        = 0;
       $horaextranocturna   = 0;
       $diasferiados        = 0;
       $bono                = 0; 
       $sueldo              = 0;
       $total_deducciones   = 0;
       $deduccionemp        = 0;

       $sabadost          += $dias_feriados          * $request->st;
       $domingost         += $dias_feriados          * $request->dt;
       $horasextra        += $horas_extras           * $request->he;
       $horanocturna      += $horas_nocturnas        * $request->hn;
       $horaextranocturna += $horas_extra_nocturnas  * $request->hen;
       $diasferiados      += $dias_feriados          * $request->df;
       $bono              += $bonificacion * 25 / 100 ;
       $sueldo            += $sueldo_base * 50 / 100;
       $deduccionemp      += $deduccion;



       $sueldo_asignaciones = $sabadost+ $domingost+$horasextra+$horanocturna+$horaextranocturna+$diasferiados + $sueldo + $bono;

      

      $deduccion_ivss   = $sueldo_asignaciones * 0.04 * 1 * 100 / 100;
      $prestacional_emp = $sueldo_asignaciones * 0.005 * 1 * 100 / 100;
      $vivienda_habitat = $sueldo_asignaciones * 0.01 * 1 * 100 / 100;

      $seguroivss = $deduccion_ivss;
      $prestacional = $prestacional_emp;
      $viviendah = $vivienda_habitat;

      $total_deducciones +=  $seguroivss + $prestacional + $viviendah + $deduccionemp;

      $total =  $sueldo_asignaciones - $total_deducciones;

    try
     {

          $pago = new Pago();
          $pago->metodo_pago_id = $request->metodo_pago_id;
          $pago->empleado_id    = $request->empleado_id;
          $pago->user_id        = \Auth::id();
          $pago->fecha_emision  = $request->fecha_emision;
          $pago->st             = $request->st;
          $pago->dt             = $request->dt;
          $pago->he             = $request->he;
          $pago->hn             = $request->hn;
          $pago->hen            = $request->hen;
          $pago->df             = $request->df;
          $pago->status         = 1;
          $pago->save();

          $detalle = new DetallePago();
          $detalle->pago_id            = $pago->id;
          $detalle->total_deduccion    = $total_deducciones;
          $detalle->sueldo_neto        = $sueldo;
          $detalle->total_bonificacion = $bono;
          $detalle->total_cancelado    = $sueldo_asignaciones;
          $detalle->save();    

          $notification = array('message' => '¡Datos ingresados!','alert-type' => 'success');

        return redirect()->back()->with($notification);    
    } 
    catch (Exception $e) 
    {
         $notification = array('message' => '¡Ha ocurrido un error en el formulario!','alert-type' => 'error');
    }



    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatenomina (Request $request, $pago)
    {
        //dd($request);

       //Se busca el empleado 
       $pago = Pago::find($pago);
       //dd($pago->empleado->id);
       //Se obtiene el sueldo base registrado
        $sueldo_base = $pago->empleado->sueldo_base;

       //Se obtiene una bonificación registrada al empleado
       $id = $pago->empleado->id;

       $bonificacion = BonoEmpleado::where('empleado_id', $id)->sum('cantidad');
       $bonificacion_emp = BonoEmpleado::where('empleado_id', $id)->get();
       $deduccion    = DeduccionEmpleado::where('empleado_id', $id)->sum('cantidad');

       $deduccion_emp = DeduccionEmpleado::where('empleado_id', $id)->get();
       

       /*
        
       // Bloque de sueldos extras aumentados al sueldo del empleado

        */

       $sueldo_quincenal          = $sueldo_base / 30;
       $horas_extras           = (($sueldo_base /30/8) * 150 / 100);
       $horas_nocturnas        = (($sueldo_base /30/8) * 130 / 100);
       $horas_extra_nocturnas  = (($sueldo_base /30/8) * 130 / 100) * 150 /100;
       $dias_feriados          = ($sueldo_quincenal * 150 /100);

       $sabadost            = 0;
       $domingost           = 0;
       $horasextra          = 0;
       $horanocturna        = 0;
       $horaextranocturna   = 0;
       $diasferiados        = 0;
       $bono                = 0; 
       $sueldo              = 0;
       $total_deducciones   = 0;
       $deduccionemp        = 0;

       $sabadost          += $dias_feriados          * $pago->st;
       $domingost         += $dias_feriados          * $pago->dt;
       $horasextra        += $horas_extras           * $pago->he;
       $horanocturna      += $horas_nocturnas        * $pago->hn;
       $horaextranocturna += $horas_extra_nocturnas  * $pago->hen;
       $diasferiados      += $dias_feriados          * $pago->df;
       $bono              += $bonificacion * 25 / 100 ;
       $sueldo            += $sueldo_base * 50 / 100;
       $deduccionemp      += $deduccion;



       $sueldo_asignaciones = $sabadost+ $domingost+$horasextra+$horanocturna+$horaextranocturna+$diasferiados + $sueldo + $bono;



      $deduccion_ivss   = $sueldo_asignaciones * 0.04 * 1 * 100 / 100;
      $prestacional_emp = $sueldo_asignaciones * 0.005 * 1 * 100 / 100;
      $vivienda_habitat = $sueldo_asignaciones * 0.01 * 1 * 100 / 100;

      $seguroivss = $deduccion_ivss;
      $prestacional = $prestacional_emp;
      $viviendah = $vivienda_habitat;

      $total_deducciones += $seguroivss + $prestacional + $viviendah + $deduccionemp;
      //dd($total_deducciones);
      $total =  $sueldo_asignaciones - $total_deducciones;

    try
     {

    
     
          $pago->metodo_pago_id = $request->metodo_pago_id;
          $pago->empleado_id    = $id;
          $pago->user_id        = \Auth::id();
          $pago->fecha_emision  = $request->fecha_emision;
          $pago->st             = $request->st;
          $pago->dt             = $request->dt;
          $pago->he             = $request->he;
          $pago->hn             = $request->hn;
          $pago->hen            = $request->hen;
          $pago->df             = $request->df;
          $pago->status         = '1';
          $pago->save();

          $detalle = DetallePago::where('pago_id',$pago->id)->first();
          $detalle->pago_id            = $pago->id;
          $detalle->total_deduccion    = $total_deducciones;
          $detalle->sueldo_neto        = $sueldo;
          $detalle->total_bonificacion = $bono;
          $detalle->total_cancelado    = $total;
          $detalle->save();    

          $notification = array('message' => '¡Datos ingresados!','alert-type' => 'success');

        return redirect()->back()->with($notification);    
    } 
    catch (Exception $e) 
    {
         $notification = array('message' => '¡Ha ocurrido un error en el formulario!','alert-type' => 'error');
    }


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function borrarnomina (Request $request, $pago)
    {

        \DB::delete('delete from detalle_pagos where pago_id = ?', [$pago]);

        $pago = Pago::find($pago);
        $pago->delete();

        $notification = array(
                'message' => '¡Datos eliminados!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function detalle( $id)
    {


        $pago = Pago::find($id);
        $concepto = ConceptoNomina::get();
        //dd($concepto);
        $pagos = Pago::get();
        $empleado = Empleado::find($pago->empleado_id);
        $total_pagado = DB::table('detalle_pagos as d')
        ->where('pago_id','=',$id)
        ->sum('total_cancelado');
         $detalle_pago = DB::table('detalle_pagos as d')
        ->join('pagos as p','d.pago_id','=','p.id')
        ->where('pago_id','=',$id)
        ->get();

        $config = DB::table('configuraciones')->first();
        $factura = DB::table('factura')->first();

        return view('admin.pagos.detalle', compact('pago','empleado','total_pagado','config','factura','detalle_pago','pagos','concepto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function imprimir( $id)
    {
        $pago = Pago::find($id);
        $concepto = ConceptoNomina::get();
        $pagos = Pago::get();
        $empleado = Empleado::find($pago->empleado_id);
        $total_pagado = DB::table('detalle_pagos as d')
        ->where('pago_id','=',$id)
        ->sum('total_cancelado');
         $detalle_pago = DB::table('detalle_pagos as d')
        ->join('pagos as p','d.pago_id','=','p.id')
        ->where('pago_id','=',$id)
        ->get();

        $config = DB::table('configuraciones')->first();
        $factura = DB::table('factura')->first();

        return view('admin.pagos.imprimir', compact('pago','empleado','total_pagado','config','factura','detalle_pago','pagos','concepto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
