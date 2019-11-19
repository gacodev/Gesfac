<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class SanidadTableSeeder extends Seeder
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
        $after_date = Carbon::now()->addDay(5);

        for ($i=1; $i <= 90; $i++) {

            $fecha_asignacion = null;
            $fecha_solicitud = $date;
            $asistencia = 0;

            if ($i<=30){
                $fecha_asignacion = Carbon::now()->subDay(1);
                $fecha_solicitud = Carbon::now()->subDay(10);
                $asistencia = 1;
            }

            elseif($i<=60 && $i>30 ){
                $fecha_asignacion = $date;
                $fecha_solicitud = Carbon::now()->subDay(5);
                $asistencia = 0;
            }


            \DB::table('sanidad')->insert(array(
                'alumno' => $i,
                'estado' => $i<=60?1:0,
                'tipo_cita' => $faker->numberBetween(1,3),
                'motivo' => $faker->text($maxNbChars = 30),
                'descripcion' => "Descripcion de la cita",
                'fecha_solicitud' => $fecha_solicitud,
                'fecha_asignacion' => $fecha_asignacion,
                'asistencia' => $asistencia,
            ));
        }
    }
}
