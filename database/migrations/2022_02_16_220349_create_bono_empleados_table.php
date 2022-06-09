<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bono_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_bono');
            $table->integer('empleado_id')->unsigned()->default(1);
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('tiempo_bonificacion');
            $table->string('fecha_emision');
            $table->string('moneda');
            $table->double('cantidad');
            $table->integer('status');
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
        Schema::dropIfExists('bono_empleados');
    }
}
