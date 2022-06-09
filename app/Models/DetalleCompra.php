<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    //use HasFactory;



     public function producto(){
        return $this->belongsTo(Producto::class, 'idproducto');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function comprobante(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }
}
