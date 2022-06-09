<?php

namespace App\Http\Controllers;

use App\Models\RetencionNomina;
use Illuminate\Http\Request;

class RetencionNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retencion = RetencionNomina::get();
        return view('admin.retencion.index', compact('retencion'));
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
        $retencion = new RetencionNomina();
        $retencion->nomina_id= 1;
        $retencion->descripcion= $request->descripcion;
        $retencion->valor= $request->valor;
        $retencion->save();

         $notification = array(
        'message' => '¡Datos ingresados!',
        'alert-type' => 'success'
         );      
         return \Redirect::back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RetencionNomina  $retencionNomina
     * @return \Illuminate\Http\Response
     */
    public function show(RetencionNomina $retencionNomina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RetencionNomina  $retencionNomina
     * @return \Illuminate\Http\Response
     */
    public function edit(RetencionNomina $retencionNomina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RetencionNomina  $retencionNomina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $retencionNomina)
    {
        $retencion = RetencionNomina::find($retencionNomina);
        $retencion->nomina_id= 1;
        $retencion->descripcion= $request->descripcion;
        $retencion->valor= $request->valor;
        $retencion->save();

         $notification = array(
        'message' => '¡Datos ingresados!',
        'alert-type' => 'success'
         );      
         return \Redirect::back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RetencionNomina  $retencionNomina
     * @return \Illuminate\Http\Response
     */
    public function destroy(RetencionNomina $retencionNomina)
    {
        //
    }
}
