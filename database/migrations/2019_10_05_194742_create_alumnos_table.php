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
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('rh')->nullable();
            $table->boolean('excusado')->default(1);
            $table->boolean('editable')->default(1);;

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
