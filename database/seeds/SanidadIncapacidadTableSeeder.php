<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SanidadIncapacidadTableSeeder extends Seeder
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

        for ($i=1; $i <= 20; $i++) {
            \DB::table('sanidad_incapacidad')->insert(array(
                'asignacion' => $i,
                'fecha_incapacidad' => $after_date,
                'motivo' => $faker->text($maxNbChars = 30),
                'observaciones' => $faker->text($maxNbChars = 120),
                'lugar' => $faker->text($maxNbChars = 30),
                'excusado' => $faker->numberBetween(0,1),
            ));
        }
    }
}
