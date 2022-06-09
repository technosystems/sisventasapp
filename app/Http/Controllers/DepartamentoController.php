<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academias = Departamento::get();
        return view('admin.departamentos.index',compact('academias'));
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
        $estado =new Departamento();
        $estado->name = $request->name;
        $estado->status = $request->status;
        $estado->user_id = \Auth::user()->id;
        $estado->save(); 

        $notification = array(
                'message' => '¡Datos ingresados!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoServicio  $estadoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoServicio $estadoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstadoServicio  $estadoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoServicio $estadoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstadoServicio  $estadoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $estado_id)
    {
        $estado = Departamento::find($estado_id);
        $estado->name = $request->name;
        $estado->status = $request->status;
        $estado->user_id = \Auth::user()->id;
        $estado->save();

        $notification = array(
                'message' => '¡Datos modificados!',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadoServicio  $estadoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoServicio $estadoServicio)
    {
        //
    }
}
