<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SanidadNovedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $after_date = Carbon::now()->addDay(4);
        $now_date = Carbon::now();

        for ($i=1; $i <= 30; $i++) {

            $excusado = $faker->numberBetween(0,1);

            \DB::table('sanidad_novedad')->insert(array(
                'cita' => $i,
                'fecha_novedad' => $excusado?$after_date:$now_date,
                'motivo' => $faker->text($maxNbChars = 30),
                'observaciones' => $faker->text($maxNbChars = 120),
                'lugar' => $faker->text($maxNbChars = 30),
                'excusado' => $excusado,
            ));
        }
    }
}
