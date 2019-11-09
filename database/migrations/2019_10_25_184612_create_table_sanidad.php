<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanidad_solicitar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado')->default(0);
            $table->unsignedBigInteger('alumno');
            $table->foreign('alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('tipo_cita');
            $table->foreign('tipo_cita')->references('id')->on('tipo_cita');
            $table->string('descripcion');
            $table->date('fecha_solicitud');
            $table->string('motivo');
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
        Schema::dropIfExists('sanidad');
    }
}
