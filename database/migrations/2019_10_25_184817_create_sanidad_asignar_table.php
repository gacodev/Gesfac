<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanidadAsignarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanidad_asignar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('asistencia')->default(0);
            $table->unsignedBigInteger('solicitud');
            $table->foreign('solicitud')->references('id')->on('sanidad_solicitar');
//            $table->unsignedBigInteger('doctor');
//            $table->foreign('doctor')->references('id')->on('doctor');
            $table->date('fecha_asignacion');
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
        Schema::dropIfExists('sanidad_solitar');
    }
}
