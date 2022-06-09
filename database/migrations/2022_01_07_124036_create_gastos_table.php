<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fecha');
            $table->string('mes');
            $table->string('year');
            $table->string('hora');
            $table->double('cantidad')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('tipo_gasto_id')->unsigned();
            $table->foreign('tipo_gasto_id')->references('id')->on('tipo_gastos');
            $table->integer('caja_id')->unsigned();
            $table->foreign('caja_id')->references('id')->on('cajas');
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
        Schema::dropIfExists('gastos');
    }
}
