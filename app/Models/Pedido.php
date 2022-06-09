<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    


    public function detalle()
    {
        return $this->hasMany(DetallePedido::class,'pedido_id');
    }


     public function clientes(){
        return $this->belongsTo(Cliente::class, 'idcliente');
    }
}
