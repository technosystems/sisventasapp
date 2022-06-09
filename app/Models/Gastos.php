<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = "gastos";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[	
        'idcaja',	
        'detalle',
        'precio_gasto',
        'nota',
        
    ];

    protected $guarded=[

    ];


     public function tipo_gasto(){
        return $this->belongsTo(TipoGasto::class, 'tipo_gasto_id');
    }
}
