<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanidadIncapacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanidad_novedad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cita');
            $table->foreign('cita')->references('id')->on('sanidad');
            $table->date('fecha_novedad');
            $table->string('observaciones');
            $table->string('motivo');
            $table->string('lugar');
            $table->boolean('excusado');
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
        Schema::dropIfExists('sanidad_incapacidad');
    }
}
