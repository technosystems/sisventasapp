<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //use HasFactory;

    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'empleado_id');
    }

     public function metodo()
    {
        return $this->belongsTo(MetodoPago::class,'metodo_pago_id');
    }


    public function detalle()
    {
        return $this->hasOne(DetallePago::class,'pago_id');
    }
}
