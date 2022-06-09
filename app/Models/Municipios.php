<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    //use HasFactory;





    /*
    |
    | ** Relationships model **
    |
    */

   public function parroquias()
    {

         return $this->HasMany('App\Models\Parroquias', 'municipio_id');
    }


     public function estado(){
        return $this->belongsTo(Estados::class, 'estado_id');
    }
}
