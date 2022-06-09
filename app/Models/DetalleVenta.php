<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;

class DetalleVenta extends Model
{
  // use HasFactory;


     public function producto(){
        return $this->belongsTo(Producto::class, 'idproducto');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function comprobante(){
        return $this->belongsTo(Venta::class, 'idventa');
    }

}
