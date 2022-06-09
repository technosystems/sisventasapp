<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    

    public function LineasProducto(){
        return $this->hasMany(LineaProducto::class);
    }

     public function precio(){
        return $this->hasOne(ProductoPrecio::class, 'producto_id');
    }

     public function iva(){
        return $this->belongsTo(TasasIva::class, 'tasa_iva_id');
    }




    public function scopeBuscarPorCodigo($query, $codigo){
        return $query->where('codigo_barra','=',$codigo);
    }

    public function scopeBuscarPorNombre($query, $nombre){
        return $query->where('descripcion','=',$nombre);
    }

    public function scopeBuscarPorCodigoDeBarras($query, $codigo_de_barras){
        if($codigo_de_barras == null){
            return $query->where('codigo_barra','=',$codigo_de_barras);
        }else{
            return $query->where('codigo_barra_de_barras','=',$codigo_de_barras);
        }
    }

    public function scopeBuscarPorId($query, $id){
        return $query->where('id','=', $id);
    }

    public function registrarCambioStock($cantidad, $descripcion){
        $lineaProducto = new LineaProducto();
        $lineaProducto->producto()->associate($this);
        $lineaProducto->usuario()->associate(\Auth::user());
        $lineaProducto->stock = $this->stock_actual;
        $lineaProducto->descripcion = $descripcion;
        $lineaProducto->cantidad = $cantidad;
        $lineaProducto->fecha = date("Y-m-d H:i:s");
        $lineaProducto->save();
    }

    public function registrarCambioPrecio(){

        \DB::table('producto_precios')->insert([
            'producto_id' => $this->id,
            'usuario_id' => \Auth::user()->id,
            'fecha' => date("Y-m-d H:i:s"),
            'precio' => $this->precio_venta
        ]);
    }

    public function preciosHistorico(){
        return \DB::table('producto_precios')->select(
            'fecha',
            'usuario_id',
            'precio'
        )->where('producto_id', $this->id)
        ->orderBy('fecha', 'desc')->get();
    }

    public function scopeFiltrar($query, $texto){
        return $query
        ->where(DB::Raw("CONCAT(productos.codigo, ' ', productos.descripcion)"),'like', '%'.$texto.'%');
    }

    public function scopeFiltrarPorNombre($query, $texto, $boolean = 'or'){
        return $query->where('descripcion', 'like', '%'.$texto.'%', $boolean);
    }

    public function scopeFiltrarPorCodigo($query, $codigo, $boolean = 'or'){
        return $query->where('codigo_barra', 'like', '%'.$codigo.'%', $boolean);
    }


    public function ganancias(){
        return $this->hasMany(Ganancias::class)->withTrashed();
    }


}
