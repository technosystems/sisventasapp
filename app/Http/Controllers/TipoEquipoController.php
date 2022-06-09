<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEquipo;

class TipoEquipoController extends Controller
{
    public  function index()
    {
        $academias = TipoEquipo::get();


        return view ('admin.equipos.index',compact('academias'));
    }


    public function store(Request $request)
    {   
        
        $marca = new  TipoEquipo();
        $marca->name = $request->name;
        $marca->status = $request->status;

        $marca->save();

        if ($marca) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }



    }

     public function guardarajax(Request $request)
    {   
        
        $tipoequipo = new  TipoEquipo();
        $tipoequipo->name = $request->descripcion;
        $tipoequipo->status = $request->status;


        $tipoequipo->save();

        if ($tipoequipo) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        $id = $tipoequipo->id;
        $name = $tipoequipo->name;

        return compact('id','name');

       }



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $marca = TipoEquipo::find($id);
        $marca->name = $request->name;
        $marca->status = $request->status;

        $marca->save();

        if ($marca) {
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
        
        return \Redirect::back()->with($notification);
       }
   
    }

    public function show($id)
    {
        $marca = TipoEquipo::find($id);
       
     
     return $marca;
    }
}
