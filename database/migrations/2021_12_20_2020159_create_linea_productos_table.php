<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_productos', function (Blueprint $table) {
           $table->increments('id');
            // Producto asociado
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            // Usuario asociado
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            // Cinoribante asociado : NULLABLE
            $table->integer('venta_id')->unsigned()->nullable();
            $table->foreign('venta_id')->references('id')->on('venta');
            
            $table->string('descripcion');            
            $table->DateTime('fecha')->default(date("Y-m-d H:i:s"));
            //$table->string('stock')->default(0);

            // Tasa de IVA
            $table->integer('tasa_iva')->nullable()->default(1);
        
            $table->double('precioUnitario')->nullable();
            $table->string('cantidad');

            $table->double('subTotal')->nullable();
            $table->double('iva')->nullable();
            $table->double('total')->nullable();
             $table->timestamps();
            $table->index(['fecha']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_productos');
    }
}
