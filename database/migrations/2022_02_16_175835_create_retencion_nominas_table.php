<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetencionNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retencion_nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomina_id')->unsigned()->default(1);
            $table->foreign('nomina_id')->references('id')->on('c_nominas');
            $table->string('descripcion');
            $table->string('valor');
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
        Schema::dropIfExists('retencion_nominas');
    }
}
