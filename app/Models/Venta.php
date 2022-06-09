<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    // use HasFactory;


    protected $table = "venta";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[   
        'iduser',   
        'fecha',
        'mes',
        'year',
        'serie',
        'correlativo',
        'razon_social',
        'tipo_factura',
        'hora'
    ];

    protected $guarded=[

    ];

    public $keyType = 'string';



    public function linea()
    {
        return $this->hasMany(LineaProducto::class,'venta_id');
    }


     public function clientes(){
        return $this->belongsTo(Cliente::class, 'idcliente');
    }

     public function factura(){
        return $this->hasOne(Factura::class);
    }
}

