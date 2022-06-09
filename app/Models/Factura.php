<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "facturas";
    protected $primaryKey = "id";

    public $timestamps = false;


    protected $guarded=[

    ];


    public function comprobante(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function recibos(){
        return $this->belongsToMany(Recibo::class, 'recibo_facturas', 'factura_id', 'recibo_id')->withPivot('deuda_inicial', 'deuda_final');
    }


    // BUSQUEDA
    public function scopeBuscarPorCliente($query, $texto, $boolean = 'or'){     
        $query->join('venta', 'venta.id', '=', 'facturas.venta_id')
                    ->select('facturas.*')
                    ->where('venta.idcliente', '=', $texto, $boolean);
    }
    

    // FLITROS
    public function scopeFiltrarPorFecha($query, $texto, $boolean = 'or'){      
        return $query->where('facturas.fecha_vencimiento', '<=', $texto, $boolean);
    }   

    public function scopeFiltrarPorCliente($query, $texto, $boolean = 'or'){
        $query->join('venta', 'venta.id', '=', 'facturas.venta_id')
                    ->where('venta.idcliente', '=', $texto, $boolean);
    }
}
