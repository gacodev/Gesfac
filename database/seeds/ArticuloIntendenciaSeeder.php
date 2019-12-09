<?php

use App\ArticuloIntendencia;
use Illuminate\Database\Seeder;

class ArticuloIntendenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['articulo' => 'CAMUFLADO'],
            ['articulo' => 'N1'],
            ['articulo' => 'N3'],
            ['articulo' => 'N4'],
            ['articulo' => 'CAMISETA DE DEPORTES'],
            ['articulo' => 'SUDADERA DE DEPORTES'],
            ['articulo' => 'PANTALON N4'],
            ['articulo' => 'PANTALON DE DEPORTES'],
            ['articulo' => 'REATA'],
            ['articulo' => 'CINTURON AZUL'],
            ['articulo' => 'LIGAS'],
            ['articulo' => 'TENIS DEPORTES'],
            ['articulo' => 'CAMISETAS SIGTA'],
            ['articulo' => 'CAMISAS AZULES'],
            ['articulo' => 'MEDIAS NEGRAS'],
            ['articulo' => 'MEDIAS BLANCAS'],
            ['articulo' => 'MEDIAS AZULES'],
            ['articulo' => 'PLACAS'],
            ['articulo' => 'GAFAS FAC'],
            ['articulo' => 'BOTAS'],
            ['articulo' => 'FIELDJACK'],
            ['articulo' => 'MALLA'],
            ['articulo' => 'BIKER'],
            ['articulo' => 'KIT DE ASEO ARMAMENTO'],
            ['articulo' => 'KIT DE ASEO PERSONAL'],
            ['articulo' => 'LINNER'],
            ['articulo' => 'JUEGO DE SABANAS'],
            ['articulo' => 'CHALECO'],
            ['articulo' => 'RIBETEADO'],
            ['articulo' => 'GORRAS DE DEPORTES'],
            ['articulo' => 'FORNITURA'],
            ['articulo' => 'AL_FAC'],
            ['articulo' => 'PIJAMA'],
            ['articulo' => 'PORTA VESTIDOS'],
            ['articulo' => 'SILLA TACTICA'],
            ['articulo' => 'CAMELBACK'],
            ['articulo' => 'CAJA PLASTICA'],
            ['articulo' => 'CINTURON ELASTICO'],
            ['articulo' => 'CORBATA CORBATIN'],
            ['articulo' => 'JABONERA'],
            ['articulo' => 'GUIA DE ESTUDIO'],
            ['articulo' => 'BOLSA ROPA INTERIOR'],
            ['articulo' => 'CAMISETA N4'],
            ['articulo' => 'CAMISETAS BLANCAS'],
            ['articulo' => 'CARRAMPLONES'],
            ['articulo' => 'COSTURERO'],
            ['articulo' => 'APELLIDOS TELA'],
            ['articulo' => 'TULAS INTENDENCIA'],
            ['articulo' => 'MALETA INTENDENCIA'],
            ['articulo' => 'CHAROLES'],
            ['articulo' => 'MALETAS SIGTA'],
            ['articulo' => 'CHANCLAS'],
            ['articulo' => 'ESCUDO PARA GORROS'],
            ['articulo' => 'GUANTES BLANCOS'],
            ['articulo' => 'TULA DE DEPORTE'],
            ['articulo' => 'POMPOM GORRA N3'],
            ['articulo' => 'CAMISA CLERICAL'],
            ['articulo' => 'LINTERNA'],
        ];

        foreach ($data as $registro) {
            ArticuloIntendencia::create($registro);
        }
    }
}
