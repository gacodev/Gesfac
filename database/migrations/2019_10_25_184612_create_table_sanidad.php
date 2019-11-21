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
        Schema::create('sanidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado')->default(0);
            $table->boolean('asignado')->default(0);
            $table->unsignedBigInteger('alumno');
            $table->foreign('alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('tipo_cita')->default(1);
            $table->foreign('tipo_cita')->references('id')->on('tipo_cita');
            $table->string('descripcion')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->string('motivo')->nullable();
            $table->date('fecha_asignacion')->nullable();
            $table->boolean('asistencia')->default(0);
            $table->date('fecha_incapacidad')->nullable();
            $table->string('observaciones_incapacidad')->nullable();
            $table->string('motivo_incapacidad')->nullable();
            $table->string('lugar_incapacidad')->nullable();
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
