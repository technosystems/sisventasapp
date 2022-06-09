<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_barra')->unique();
            $table->string('descripcion');
            //$table->decimal('precio_costo',15,2);
            $table->decimal('precio_venta', 15,2);
            //$table->decimal('precio_mayoreo', 15,2)->default(0.00);
            //$table->string('stock_actual');
            //$table->integer('stock_minimo');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('marca')->nullable();
            $table->string('categoria'); 
            $table->string('presentacion');
            //$table->string('fecha_vencimiento');
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('productos');
    }
}
