<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoNovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_novedad', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('novedad')->nullable();
            $table->foreign('novedad')->references('id')->on('novedades');

            $table->unsignedBigInteger('alumno')->nullable();
            $table->foreign('alumno')->references('id')->on('alumnos');

            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->boolean('excusado');
            $table->string('observaciones');

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
        Schema::dropIfExists('alumno_novedads');
    }
}
