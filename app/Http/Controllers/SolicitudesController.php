<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;
use App\Models\Municipios;

class SolicitudesController extends Controller
{
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function municipios($id)
    {
            
            $estado = Estados::find($id);
            $municipios = $estado->municipios;

            return \Response::json($municipios);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parroquias($id)
    {
            
            $municipios = Municipios::find($id);
            $parroquias = $municipios->parroquias;
           
            return \Response::json($parroquias);

    }
}
