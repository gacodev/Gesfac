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
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos');

            $table->unsignedBigInteger('articulo');
            $table->foreign('articulo')->references('id')->on('articulo_intendencia');

            $table->string('descripcion');
            $table->integer('cantidad');

//            $table->bigInteger('camuflado')->nullable();
//            $table->integer('n1')->nullable();
//            $table->integer('n3')->nullable();
//            $table->integer('n4')->nullable();
//            $table->integer('camisetas de deportes')->nullable();
//            $table->integer('sudadera de deportes')->nullable();
//            $table->integer('pantalon de n4')->nullable();
//            $table->integer('pantalonetas de deportes')->nullable();
//            $table->integer('reata')->nullable();
//            $table->integer('cinturon azul')->nullable();
//            $table->integer('ligas')->nullable();
//            $table->integer('tennis deporte')->nullable();
//            $table->integer('camisetas_sigta')->nullable();
//            $table->integer('camisas azules')->nullable();
//            $table->integer('medias negras')->nullable();
//            $table->integer('medias blancas')->nullable();
//            $table->integer('medias azules')->nullable();
//            $table->integer('placas')->nullable();
//            $table->integer('gafas fac')->nullable();
//            $table->integer('botas')->nullable();
//            $table->integer('fieldjack')->nullable();
//            $table->integer('malla')->nullable();
//            $table->integer('biker')->nullable();
//            $table->integer('kit de aseo armamento')->nullable();
//            $table->integer('kit de aseo personal')->nullable();
//            $table->integer('linner')->nullable();
//            $table->integer('juego de sabanas')->nullable();
//            $table->integer('chaleco')->nullable();
//            $table->integer('ribeteado')->nullable();
//            $table->integer('gorras de deportes')->nullable();
//            $table->integer('fornitura')->nullable();
//            $table->integer('al_fac')->nullable();
//            $table->integer('pijama')->nullable();
//            $table->integer('portavestidos')->nullable();
//            $table->integer('silla_tactica')->nullable();
//            $table->integer('camelback')->nullable();
//            $table->integer('caja_plastica')->nullable();
//            $table->integer('cinturon_elastico')->nullable();
//            $table->integer('corbata_corbatin')->nullable();
//            $table->integer('jabonera')->nullable();
//            $table->integer('guia de estudio')->nullable();
//            $table->integer('bolsa_ropainterior')->nullable();
//            $table->integer('camisa n4')->nullable();
//            $table->integer('camisetas_blacas')->nullable();
//            $table->integer('carramplones')->nullable();
//            $table->integer('costurero')->nullable();
//            $table->integer('apellidos_tela')->nullable();
//            $table->integer('tulas_intendencia')->nullable();
//            $table->integer('maleta_intendencia')->nullable();
//            $table->integer('charoles')->nullable();
//            $table->integer('maleta_sigta')->nullable();
//            $table->integer('chanclas')->nullable();
//            $table->integer('escudo para gorro')->nullable();
//            $table->integer('guantes blancos')->nullable();
//            $table->integer('tula de deportes')->nullable();
//            $table->integer('pompom gorra n3')->nullable();
//            $table->integer('camisa clerical')->nullable();
//            $table->integer('linterna')->nullable();

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
