<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use Illuminate\Http\Request;
use Session;

class ConfiguracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = \DB::table('configuraciones')->first();
       // dd($config);
        return view('admin.config.general',compact('config'));
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
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function show(Configuraciones $configuraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuraciones $configuraciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       //dd($request);

         $validator = $request->validate([
            'titulo'=>'required|max:50',    
            'logo'=>'max:5000',
            'marcas'=>'required',
            'categorias'=>'required',
            'presentaciones'=>'required',
            'denomicaciones'=>'required',   
           
            'cajas'=>'required',    
            'serie'=>'required|max:3',
            'correlativo'=>'required|max:7',    
            'iva'=>'required|numeric',
        ]);


         try {
           
            $config = Configuraciones::findOrFail($id);
            $config->titulo = $request->get('titulo');
            $config->marcas = preg_replace("/[\r\n|\n|\r]+/", " ",$request->get('marcas'));
            $config->categorias = $request->get('categorias');
            $config->presentaciones = preg_replace("/[\r\n|\n|\r]+/", " ",$request->get('presentaciones'));
            $config->denomicaciones = preg_replace("/[\r\n|\n|\r]+/", " ",$request->get('denomicaciones'));
            $config->currency = $request->currency;
            $config->tipo_moneda = $request->tipo_moneda;
            $config->prefijo_moneda = $request->prefijo_moneda;
            $config->cajas = preg_replace("/[\r\n|\n|\r]+/", " ",$request->get('cajas'));
            $config->serie = $request->get('serie');
            $config->correlativo = $request->get('correlativo');
            $config->iva = $request->get('iva');
            $config->update();
           
            $notification = array('message' => '¡Datos registrados!','alert-type' => 'success');    
            return \Redirect::back()->with($notification);
            
          } catch (\Exception $e) {
            dd($e);
            $notification = array('message' => '¡Error al cargar datos!','alert-type' => 'error' );      
        return \Redirect::back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuraciones $configuraciones)
    {
        //
    }
}
