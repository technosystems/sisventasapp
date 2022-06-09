<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes');
            //Producto asociado al pedido
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('id')->on('productos');
            $table->string('fecha');          
            $table->double('cantidad')->default(0);    
            $table->double('precio_pedido')->nullable();
            $table->double('subTotal')->nullable();
            $table->double('iva')->nullable();
            $table->double('total_pagar')->nullable();
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
