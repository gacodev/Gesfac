<?php

use App\AlumnoNovedad;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class AlumnoNovedadSeeder extends Seeder
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

        for ($i=1; $i <= 30; $i++) {
            AlumnoNovedad::create([
                'novedad' => $faker->numberBetween(1,15),
                'alumno' => $i,
                'fecha_inicio' => $date,
                'fecha_final' => $date,
                'excusado' => $faker->numberBetween(0,1),
                'observaciones' => $faker->text(50),
            ]);
        }
    }
}
