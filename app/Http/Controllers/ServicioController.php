<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index()
    {
        $academias = Servicio::get();
        return view ('admin.servicios.index',compact('academias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

           

            $servicio = new Servicio();
            $servicio->codigo = $request->codigo;
            $servicio->descripcion = $request->descripcion;
            $servicio->precio_costo = $request->precio_costo;
            $servicio->status = $request->status;
            $servicio->user_id = auth()->user()->id;
            $servicio->save();

        

            $notification = array(
                'message' => '¡Datos ingresados!',
                'alert-type' => 'success'
            );
                return redirect()->to('/admin/servicio/create')->with($notification);
        } catch (\Exception $e) {
            
             $notification = array(
                'message' => '¡Hubo un error al completar el formulario!',
                'alert-type' => 'error'
            );
            return redirect()->to('/admin/servicio/create')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $servicio)
    {
         try {

           

            $servicio = Servicio::find($servicio);

            $servicio->codigo = $request->codigo;
            $servicio->descripcion = $request->descripcion;
            $servicio->precio_costo = $request->precio_costo;
            $servicio->status = $request->status;
            $servicio->user_id = auth()->user()->id;
            $servicio->save();

        

            $notification = array(
                'message' => '¡Datos ingresados!',
                'alert-type' => 'success'
            );
                return redirect()->to('/admin/servicio')->with($notification);
        } catch (\Exception $e) {
            dd($e);
             $notification = array(
                'message' => '¡Hubo un error al completar el formulario!',
                'alert-type' => 'error'
            );
            return redirect()->to('/admin/servicio')->with($notification);
        }
    }



    public function buscar(Request $request){

        $texto = $request->texto;
        $servicios = Servicio::where('codigo', $texto)
        ->where('descripcion',$texto)
        ->get();
         
        if(count($servicios) == 0){         
            $servicios = Servicio::FiltrarPorCodigo($texto)
                            ->FiltrarPorNombre($texto)
                            ->get();
        }
        return Response()->json([
            'productos' => $servicios
        ]);
    }
}
