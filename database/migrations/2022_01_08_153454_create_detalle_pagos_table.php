<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pagos', function (Blueprint $table) {
            $table->id();
            $table->integer('pago_id')->unsigned()->default(1);
            $table->foreign('pago_id')->references('id')->on('pagos');
            $table->double('sueldo_neto');
            $table->double('total_deduccion');
            $table->double('total_bonificacion');
            $table->double('total_cancelado');
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
        Schema::dropIfExists('detalle_pagos');
    }
}
