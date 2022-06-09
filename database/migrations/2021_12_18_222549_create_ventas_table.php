<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users');
            $table->string('email');
            $table->string('fecha');
            $table->string('mes'); 
            $table->string('year');
            $table->string('serie');
            $table->string('tipo_pago', 100)->nullable();
            $table->string('nu_referencia', 100)->nullable();
            $table->string('correlativo');
            $table->string('razon_social')->nullable();
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->string('tipo_factura');
            $table->string('descripcion',900)->nullable();
            $table->string('hora');
            $table->smallInteger('nu_iva');
            $table->integer('idcaja')->unsigned();
            $table->foreign('idcaja')->references('id')->on('cajas');
            $table->double('subTotal')->default(0);
            $table->double('iva')->default(0);
            $table->double('total')->default(0);
            $table->string('estado');
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
        Schema::dropIfExists('venta');
    }
}
