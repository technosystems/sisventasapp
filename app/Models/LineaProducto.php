<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaProducto extends Model
{
    //use HasFactory;


    public function productos(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function comprobante(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function iva(){
        return $this->belongsTo(TasaIva::class, 'tasa_iva_id');
    }

    public function ventas(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
}
