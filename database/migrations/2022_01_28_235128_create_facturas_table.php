<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');

            // Comprobante asociado
            $table->integer('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('venta');

            $table->date('fecha_vencimiento');
            $table->integer('plazo')->nullable();
            
            $table->double('deuda_original');
            $table->double('deuda_actual');

            $table->index(['fecha_vencimiento']);
            $table->timestamps();

            $table->index(['venta_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
