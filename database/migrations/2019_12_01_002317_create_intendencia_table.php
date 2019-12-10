<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntendenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intendencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno');
            $table->foreign('alumno')->references('id')->on('alumnos');

            $table->unsignedBigInteger('articulo');
            $table->foreign('articulo')->references('id')->on('articulo_intendencia');

            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();

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
        Schema::dropIfExists('intendencia');
    }
}
