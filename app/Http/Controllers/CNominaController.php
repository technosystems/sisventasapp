<?php

namespace App\Http\Controllers;

use App\Models\CNomina;
use Illuminate\Http\Request;

class CNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CNomina  $cNomina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $nomina = CNomina::find($id);
        return view('admin.config.nomina', compact('nomina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CNomina  $cNomina
     * @return \Illuminate\Http\Response
     */
    public function edit(CNomina $cNomina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CNomina  $cNomina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $config)
    {
        $nomina = CNomina::find($config);
        $nomina->dias_utilidades = $request->dias_utilidades;
        $nomina->disfrute_vacacional = $request->disfrute_vacacional;
        $nomina->bono_vacacional = $request->bono_vacacional;
        $nomina->dias_laborales = $request->dias_laborales;
        $nomina->dias_habiles = $request->dias_habiles;
        $nomina->dias_feriados = $request->dias_feriados;
        $nomina->nu_lunes = $request->nu_lunes;
        $nomina->dias_jornada_laboral = $request->dias_jornada_laboral;
        $nomina->tipo_pago = $request->tipo_pago;
        $nomina->porcentaje_pago = $request->porcentaje_pago;
        $nomina->mes = $request->mes;
        $nomina->year = date('Y');
        $nomina->save();

         $notification = array(
        'message' => '¡Datos ingresados!',
        'alert-type' => 'success'
         );      
         return \Redirect::back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CNomina  $cNomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(CNomina $cNomina)
    {
        //
    }
}
