<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturasCompras extends Model
{
    //use HasFactory;




    public function compras(){
        return $this->belongsTo(Compra::class, 'compra_id');
    }

     public function tipo(){
        return $this->belongsTo(TipoCompra::class, 'tipo_compra_id');
    }

    public function recibos(){
        return $this->belongsToMany(RecibosCompras::class, 'recibo_compras_facturas', 'factura_compra_id', 'recibo_compra_id')->withPivot('deuda_inicial', 'deuda_final');
    }


    // BUSQUEDA
     public function scopeBuscarPorProveedor($query, $texto, $boolean = 'or'){     
        $query->join('compras', 'compras.id', '=', 'facturas_compras.compra_id')
                    ->select('facturas_compras.*')
                    ->where('compras.proveedor_id', '=', $texto, $boolean);
    }

    // FLITROS
    public function scopeFiltrarPorFecha($query, $texto, $boolean = 'or'){      
        return $query->where('facturas.fecha_vencimiento', '<=', $texto, $boolean);
    }   

    
}
