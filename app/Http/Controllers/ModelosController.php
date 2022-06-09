<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelos;
class ModelosController extends Controller
{
    public  function index()
    {
        $academias = Modelos::get();
        return view ('admin.modelos.index',compact('academias'));
    }


    public function store(Request $request)
    {   
        
        $modelo = new  Modelos();
        $modelo->descripcion = $request->descripcion;
        $modelo->descripcion_tecnica = $request->descripcion_tecnica;
        $modelo->marca_id = $request->marca_id;
        $modelo->status = $request->status;
        $modelo->user_id = \Auth::user()->id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

       
        if ($modelo) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }



    }


     public function guardarajax(Request $request)
    {   
        //dd($request->idmarca);
        
        $modelo = new  Modelos();
        $modelo->descripcion = $request->descripcion;
        $modelo->descripcion_tecnica = $request->descripcion_tecnica;
        $modelo->marca_id = $request->idmarca;
        $modelo->status = 1;
        $modelo->user_id = \Auth::user()->id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

       
        if ($modelo) {
          


        $id = $modelo->id;
        $descripcion = $modelo->descripcion;

        return compact('id','descripcion');
       }



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $modelo = Modelos::find($id);
        $modelo->descripcion = $request->descripcion;
        $modelo->descripcion_tecnica = $request->descripcion_tecnica;
        $modelo->marca_id = $request->marca_id;
        $modelo->status = $request->status;
        $modelo->user_id = \Auth::user()->id;
        $modelo->fecha = date('d/m/Y H:m:s');

        $modelo->save();

        if ($modelo) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }
   
    }

    public function show($id)
    {   
        $modelo = Modelos::find($id);
        
        return $modelo;
    }
}
