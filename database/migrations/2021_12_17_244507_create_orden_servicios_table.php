<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_equipo_id')->unsigned();
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipos');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->string('tipo_reparacion');
            $table->string('orservacion_recepcion');
            $table->string('accesorios');
            $table->string('imei');
            $table->string('clave');
            $table->string('color');
            $table->double('costo');
            $table->double('anticipo');
            $table->date('fecha_entrega');
            $table->integer('estado_servicio_id')->unsigned();
            $table->foreign('estado_servicio_id')->references('id')->on('estado_servicios');
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
        Schema::dropIfExists('orden_servicios');
    }
}
