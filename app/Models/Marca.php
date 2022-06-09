<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //use HasFactory;


    public function tipoequipo()
    {
        return $this->belongsTo(TipoEquipo::class,'tipo_equipo_id');
    }
}
