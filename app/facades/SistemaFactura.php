<?php

namespace App\Facades;

use App\Models\TipoDocumento;
use App\Models\Venta;
use App\Models\Factura;

class SistemaFactura
{
	private static $instancia;

	public static function getInstancia(){
		if(!isset(self::$instancia))
			self::$instancia = new SistemaFactura();
		return self::$instancia;
	}

	public function ingresarFactura($venta, $fecha_vencimiento, $deuda_original, $deuda_actual, $plazo){
		$nuevaFactura = new Factura();

		// Campos obligatorios		
		$nuevaFactura->venta_id = $venta->id;
		$nuevaFactura->fecha_vencimiento = $fecha_vencimiento;
		$nuevaFactura->deuda_original = $deuda_original;

		if($plazo)
			$nuevaFactura->plazo = $plazo;

		if($deuda_actual)
			$nuevaFactura->deuda_actual = $deuda_actual;
		else
			$nuevaFactura->deuda_actual = $deuda_original;

		$nuevaFactura->save();
		return $nuevaFactura;
	}
}