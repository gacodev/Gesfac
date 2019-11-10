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
                    ['novedad' => 'excusado',],
                    ['novedad' => 'sanidad',],
                    ['novedad' => 'servicio',],
                    ['novedad' => 'comision iiafa',],
                    ['novedad' => 'comision esima',],
                    ['novedad' => 'autorizado',],
                    ['novedad' => 'halcones',],
                    ['novedad' => 'exterior',],
                    ['novedad' => 'clase',],
                    ['novedad' => 'ceremonia',],
                    ['novedad' => 'interescuelas',],
                    ['novedad' => 'calamidad',],
                    ['novedad' => 'turno',],
                    ['novedad' => 'administrativa',],
                    ['novedad' => 'ensayo',],
    ]
                    );
    }
}
