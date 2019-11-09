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
        Schema::create('sanidad_incapacidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asignacion');
            $table->foreign('asignacion')->references('id')->on('sanidad_asignar');
            $table->date('fecha_incapacidad');
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
