<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
    protected $table = 'servicios';


   


    public function scopeBuscarPorCodigo($query, $codigo){
        dd($codigo);
        return $query->where('codigo','=',$codigo);
    }

     public function scopeBuscarPorServicio($query, $texto){
        return $query->where('descripcion','=',$texto);
    }

    public function scopeFiltrarPorCodigo($query, $codigo, $boolean = 'or'){
        return $query->where('codigo', 'like', '%'.$codigo.'%', $boolean);
    }

     public function scopeFiltrarPorNombre($query, $texto, $boolean = 'or'){
        return $query->where('descripcion', 'like', '%'.$texto.'%', $boolean);
    }
      
}
