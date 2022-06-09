<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //use HasFactory;
 	



 	public function getSaldoDeuda(){
        $facturas_inpagas = FacturasCompras::buscarPorProveedor($this->id)->where('deuda_actual', '>', 0)->get();

        $saldo_negativo = $facturas_inpagas->reduce(function ($saldo, $item) {
            return $saldo + $item->deuda_actual;
        });

        $saldo_positivo = 0;

        $total = $saldo_negativo - $saldo_positivo;
        return $total;
    }
}
