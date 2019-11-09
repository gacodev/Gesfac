<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_visitantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno');
            $table->foreign('alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('visitante');
            $table->foreign('visitante')->references('id')->on('visitantes');
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
        Schema::dropIfExists('alumno_visitantes');
    }
}
