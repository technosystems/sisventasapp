<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha_registro');
            $table->string('fecha_entrega');
            $table->string('mes');
            $table->string('year');
            $table->string('serie');
            $table->string('correlativo');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->string('tipo_pedido');
            $table->string('descripcion',900)->nullable();
            $table->string('hora');
            $table->string('materiales');
            $table->string('tamano');
            $table->string('colores');
            $table->double('subTotal')->default(0);
            $table->double('iva')->default(0);
            $table->double('total')->default(0);
            $table->smallInteger('estado');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
