<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Gastos;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Pago;

use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start_date = date("Y").'-'.date("m").'-'.'01';
        $end_date =  date("Y").'-'.date("m").'-'.cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
        $yearly_sale_amount = [];
        $month[] = date("F", strtotime($start_date));

        $ventas_total = \DB::table('linea_productos')->whereDate('fecha', '>=' , $start_date)->whereDate('fecha', '<=' , $end_date)->count();

        $ventas = \DB::table('linea_productos')->whereDate('fecha', '>=' , $start_date)->whereDate('fecha', '<=' , $end_date)->sum('total');

        $total_purchase  = Gastos::with('tipo_gasto')->whereDate('fecha', '>=' , $start_date)->whereDate('fecha', '<=' , $end_date)->count();

        $purchase = Gastos::with('tipo_gasto')->whereDate('fecha', '>=' , $start_date)->whereDate('fecha', '<=' , $end_date)->sum('cantidad');

         $pago_total = Pago::whereDate('fecha_emision', '>=' , $start_date)->whereDate('fecha_emision', '<=' , $end_date)->sum('cantidad');

         $pago = Pago::whereDate('fecha_emision', '>=' , $start_date)->whereDate('fecha_emision', '<=' , $end_date)->take(5)->get();

         
        $compras_total = DetalleCompra::with('comprobante')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->count();

         $compras = DetalleCompra::with('comprobante')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('total_pagado');

        return view('admin.informe.general', compact('ventas_total','ventas','total_purchase','purchase','compras','compras_total','pago_total','pago'));

        


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
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        //
    }
}
