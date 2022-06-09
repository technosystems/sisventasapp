<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\TipoEquipos;

class MarcaController extends Controller
{
    public  function index()
    {
        $academias = Marca::get();
        return view ('admin.marcas.index',compact('academias'));
    }


    public function store(Request $request)
    {   
        //dd($request);
        
        $marca = new  Marca();
        $marca->name = $request->name;
        $marca->tipo_equipo_id = $request->tipo_equipo_id;
        $marca->status = $request->status;
        $marca->user_id = \Auth::user()->id;
        $marca->fecha_ingreso = date('d/m/Y H:m:s');

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
      //  dd($request);
     
            $marca = new  Marca();
            $marca->name = $request->descripcion;
            $marca->tipo_equipo_id = $request->idtipoequipo;
            $marca->status = $request->status;
            $marca->user_id = \Auth::user()->id;
            $marca->fecha_ingreso = date('d/m/Y H:m:s');

            $marca->save();
            


            $id = $marca->id;
            $name= $marca->name;

            return compact('id','name');

           
       



    }


    public function update(Request $request, $id)
    {   
        //dd($request);
        
        $marca = Marca::find($id);
        $marca->name = $request->name;
        $marca->tipo_equipo_id = $request->tipo_equipo_id;
        $marca->status = $request->status;
        $marca->user_id = \Auth::user()->id;
        $marca->fecha_ingreso = date('d/m/Y H:m:s');

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
        $marca = Marca::find($id);
        

        return $marca;
    }
}
