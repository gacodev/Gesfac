<?php

use Illuminate\Database\Seeder;

class NovedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserted =  DB::table('novedades')
            ->insert(
                [
                    ['novedad' => 'NINGUNA',],
                    ['novedad' => 'EXCUSADO',],
                    ['novedad' => 'SANIDAD',],
                    ['novedad' => 'SERVICIO',],
                    ['novedad' => 'IIAFA',],
                    ['novedad' => 'ESIMA',],
                    ['novedad' => 'AUTORIZADO',],
                    ['novedad' => 'HALCONES',],
                    ['novedad' => 'COMISION',],
                    ['novedad' => 'CLASE',],
                    ['novedad' => 'CEREMONIA',],
                    ['novedad' => 'INTERESCUELAS',],
                    ['novedad' => 'CALAMIDAD',],
                    ['novedad' => 'TURNO',],
                    ['novedad' => 'ADMINISTRATIVA',],
                    ['novedad' => 'GUARDIA',],
                ]
            );
    }
}
