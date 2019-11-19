<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('correo');

            $table->string('numero_documento');
            $table->boolean('excusado');
            $table->boolean('editable');

            $table->unsignedBigInteger('escuadron');
            $table->foreign('escuadron')->references('id')->on('escuadrones');

            $table->unsignedBigInteger('tipo_documento');
            $table->foreign('tipo_documento')->references('id')->on('tipo_documento');

            $table->unsignedBigInteger('novedad')->default(1);
            $table->foreign('novedad')->references('id')->on('novedades');


            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
