<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArmerillo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armerillo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('estado');
            $table->boolean('asignado');
            $table->string('fusil');
            $table->unsignedBigInteger('tipo_fusil');
            $table->foreign('tipo_fusil')->references('id')->on('tipo_fusil');
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
        Schema::dropIfExists('armerillo');
    }
}
