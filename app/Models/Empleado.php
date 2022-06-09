<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
   // use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function bonificacion()
    {
        return $this->hasMany(BonoEmpleado::class, 'empleado_id');
    }

     public function deduccion()
    {
        return $this->hasMany(DeduccionEmpleado::class, 'empleado_id');
    }



     /*
    |
    | ** Accesors model **
    |
    */

     public function getDisplayNameAttribute()
     {
         return trim(str_replace( '  ', ' ',  "{$this->name} {$this->lastname}")) ;
     }
}
