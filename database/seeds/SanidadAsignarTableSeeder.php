<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SanidadAsignarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $after_date = Carbon::now()->addDay(5);

        $before_date = Carbon::now()->subDay(5);

        for ($i=1; $i <= 40; $i++) {
            \DB::table('sanidad_asignar')->insert(array(
                'solicitud' => $i,
                'asistencia' => $i<=20?1:0,
//                'doctor' => $faker->numberBetween(1,10),
                'fecha_asignacion' => $i<=20?$before_date:$after_date
            ));
        }
    }
}
