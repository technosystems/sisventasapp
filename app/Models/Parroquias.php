<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    //use HasFactory;



     /*
    |
    | ** Relationships model **
    |
    */

    public function municipios()
    {
        return $this->belongsTo('App\Models\Municipios','municipio_id');
    }
}
