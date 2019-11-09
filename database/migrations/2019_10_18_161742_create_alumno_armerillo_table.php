<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoArmerilloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_armerillo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado');
            $table->unsignedBigInteger('alumno');
            $table->foreign('alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('fusil');
            $table->foreign('fusil')->references('id')->on('armerillo');
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
        Schema::dropIfExists('alumno_armerillo');
    }
}
