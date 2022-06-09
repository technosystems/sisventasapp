<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
   // use HasFactory;


    /*
    |
    | ** Relationships model **
    |
    */

    public function pais()
    {
        return $this->belongsTo('App\Models\Pais','pais_id');
    }

    public function municipios()
    {

         return $this->HasMany('App\Models\Municipios', 'estado_id');
    }
}
