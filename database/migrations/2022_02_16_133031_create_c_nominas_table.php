<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('c_nominas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dias_utilidades')->default(30);
            $table->string('disfrute_vacacional')->default(31);
            $table->string('bono_vacacional')->default(15);
            $table->string('dias_laborales')->default(249);
            $table->string('dias_habiles')->default(249);
            $table->string('dias_feriados')->default(17);
            $table->string('nu_lunes')->default(52);
            $table->string('dias_jornada_laboral')->default(7);
            $table->string('tipo_pago')->default('semanal');
            $table->string('porcentaje_pago')->default(23);
            $table->string('mes')->default(date('m'));
            $table->string('year')->default(date('Y'));
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
        Schema::dropIfExists('c_nominas');
    }
}
