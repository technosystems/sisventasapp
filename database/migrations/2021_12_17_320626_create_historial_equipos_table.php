<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observacion_recepcion');

            $table->integer('orden_servicio_id')->unsigned();
            $table->foreign('orden_servicio_id')->references('id')->on('orden_servicios');
            $table->integer('tipo_equipo_id')->unsigned();
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipos');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos');
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
        Schema::dropIfExists('historial_equipos');
    }
}
