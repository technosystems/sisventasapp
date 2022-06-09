<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->integer('metodo_pago_id')->unsigned()->default(1);
            $table->foreign('metodo_pago_id')->references('id')->on('metodo_pagos');
            $table->integer('empleado_id')->unsigned()->default(1);
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fecha_emision');
            $table->string('st');  //Sabados trabajdos
            $table->string('dt');  //Domingo trabajados
            $table->string('he');  //Horas Extras trabajadas
            $table->string('hn');  //Hora Nocturnas trabajadas
            $table->string('hen'); //Hora Extras Nocturnas trabajadas 
            $table->string('df');  //Días feriados trabajados
            $table->integer('status');
            $table->integer('tasa_id')->unsigned()->default(1);
            $table->foreign('tasa_id')->references('id')->on('tasas');

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
        Schema::dropIfExists('pagos');
    }
}
