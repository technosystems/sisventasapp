<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('status')->default(0);
            $table->string('fecha_ingreso')->default(date('d/m/Y'));
            $table->integer('tipo_equipo_id')->unsigned()->nullable();
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipos');
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('marcas');
    }
}
