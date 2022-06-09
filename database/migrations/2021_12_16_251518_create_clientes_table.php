<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('empresa')->default(0);
            $table->string('rif')->nullable()->unique();
            $table->string('cedula')->nullable()->unique();
            $table->string('mail')->nullable();
            $table->string('direccion')->nullable(); 
            $table->string('genero')->nullable(); 


            
            $table->index(['mail', 'rif','cedula']);
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
