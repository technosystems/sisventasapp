<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonoEmpleado extends Model
{
    

     public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
