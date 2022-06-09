<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('titulo');
            $table->string('logo');
            $table->string('marcas');
            $table->string('categorias');
            $table->string('presentaciones');
            $table->string('denomicaciones');
            $table->string('currency');
            $table->string('tipo_moneda');
            $table->string('prefijo_moneda');
            $table->string('cajas');
            $table->integer('serie')->nullable();
            $table->integer('correlativo')->nullable();
            $table->string('iva');
            $table->string('email');
            $table->softDeletes();
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
        Schema::dropIfExists('configuraciones');
    }
}
