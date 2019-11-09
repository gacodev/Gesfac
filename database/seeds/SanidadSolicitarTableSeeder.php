<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SanidadSolicitarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $date = Carbon::now();

        $before_date = Carbon::now()->subDay(5);

        for ($i=1; $i <= 60; $i++) {
            \DB::table('sanidad_solicitar')->insert(array(
                'alumno' => $i,
                'estado' => $i<=40?1:0,
                'tipo_cita' => $faker->numberBetween(1,3),
                'motivo' => $faker->text($maxNbChars = 30),
                'descripcion' => "Descripcion de la cita",
                'fecha_solicitud' => $i<=40?$before_date:$date
            ));
        }
    }
}
