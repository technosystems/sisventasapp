<?php

namespace App\Http\Controllers;

use App\Models\Vacaciones;
use Illuminate\Http\Request;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class VacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacaciones = Vacaciones::get();

       return view('admin.vacaciones.index', compact('vacaciones'));
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
       //dd($request);
        $today = getdate();
        $hora = new DateTime("now", new DateTimeZone('America/Caracas'));
        $config = \DB::table('configuraciones')
        ->first();

        $vacaciones = new Vacaciones();
        $vacaciones->user_id = auth()->user()->id;
        $vacaciones->mes = $today['mon'];
        $vacaciones->year = $today['year'];
        $vacaciones->empleado_id = $request->get('empleado_id');
        $vacaciones->nota = $request->get('nota');
        $vacaciones->fecha_desde = $request->get('fecha_desde');
        $vacaciones->fecha_hasta = $request->get('fecha_hasta');
        $mytime = Carbon::now('America/Caracas'); 
        $vacaciones->fecha = $mytime->format('Y-m-d');
        $vacaciones->hora = $hora->format('H:i:s');
        $vacaciones->save();


         if ($vacaciones) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
         );

            return \Redirect::back()->with($notification);

            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Vacaciones $vacaciones)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function updatevacaciones(Request $request, $vacaciones)
    {
       //dd($request);
        $today = getdate();
        $hora = new DateTime("now", new DateTimeZone('America/Caracas'));
        $config = \DB::table('configuraciones')
        ->first();

        $vacaciones = Vacaciones::find($vacaciones);
        $vacaciones->user_id = auth()->user()->id;
        $vacaciones->mes = $today['mon'];
        $vacaciones->year = $today['year'];
        $vacaciones->empleado_id = $request->get('empleado_id');
        $vacaciones->nota = $request->get('nota');
        $vacaciones->fecha_desde = $request->get('fecha_desde');
        $vacaciones->fecha_hasta = $request->get('fecha_hasta');
        $mytime = Carbon::now('America/Caracas'); 
        $vacaciones->fecha = $mytime->format('Y-m-d');
        $vacaciones->hora = $hora->format('H:i:s');
        $vacaciones->save();


         if ($vacaciones) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
         );

            return \Redirect::back()->with($notification);

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacaciones $vacaciones)
    {
        //
    }
}
