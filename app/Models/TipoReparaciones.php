<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReparaciones extends Model
{
    



    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }


    public function organismo()
    {
        return $this->belongsTo(Organismos::class,'organismo_id');
    }


    public function sucursal()
    {
        return $this->belongsTo(Sucursales::class,'sucursal_id');
    }

    
}
