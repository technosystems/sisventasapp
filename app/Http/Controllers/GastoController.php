<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gastos;
use App\Models\Caja;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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


        $mytime = Carbon::now('America/Lima');
        $fecha=$mytime->format('Y-m-d');

        $caja = DB::table('cajas')
        ->where('user_id','=',auth()->user()->id)
        ->first();

        $config = DB::table('configuraciones')
        ->first();

        if($caja == null){
            Session::flash('danger', 'El usuario no cuenta con una caja asignada');
            return redirect()->back();
        }

        $idcaja = $caja->id;

        $gastos = Gastos::where('caja_id','=',$idcaja)
        ->orderby('id','desc')
        ->get(); 

        return view('admin.gasto.index',compact('fecha','idcaja','gastos','config','caja'));
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
            $today = getdate();
            $hora = new DateTime("now", new DateTimeZone('America/Caracas'));
            $config = \DB::table('configuraciones')
            ->first();

            $gasto = new Gastos();
            $gasto->caja_id = $request->get('idcaja');
            $gasto->user_id = auth()->user()->id;
            $gasto->mes = $today['mon'];
            $gasto->year = $today['year'];
            $gasto->cantidad = $request->get('precio_gasto');
            $gasto->descripcion = $request->get('detalle');
            $gasto->tipo_gasto_id = $request->get('tipo_gasto_id');
            $mytime = Carbon::now('America/Caracas'); 
            $gasto->fecha = $mytime->format('Y-m-d');
            $gasto->hora = $hora->format('H:i:s');
            $gasto->save();


             if ($gasto) {
                
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
