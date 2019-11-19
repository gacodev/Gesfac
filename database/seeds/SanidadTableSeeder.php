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

        for ($i=1; $i <= 90; $i++) {

            $fecha_asignacion = null;
            $fecha_solicitud = $date;
            $fecha_incapacidad = null;
            $asistencia = 0;

            if ($i<=30){
                $fecha_asignacion = Carbon::now()->subDay(1);
                $fecha_solicitud = Carbon::now()->subDay(10);
                $fecha_incapacidad = Carbon::now()->addDay(2);
                $asistencia = 1;
            }

            elseif($i<=60 && $i>30 ){
                $fecha_asignacion = $date;
                $fecha_solicitud = Carbon::now()->subDay(5);
                $asistencia = 0;
            }


            \DB::table('sanidad')->insert(array(
                'alumno' => $i,
                'asignado' => $i<=60?1:0,
                'tipo_cita' => $faker->numberBetween(1,3),
                'motivo' => $faker->text($maxNbChars = 30),
                'descripcion' => "Descripcion de la cita",
                'fecha_solicitud' => $fecha_solicitud,
                'fecha_asignacion' => $fecha_asignacion,
                'asistencia' => $asistencia,
                'fecha_incapacidad' => $i<=30?$fecha_incapacidad:null,
                'motivo_incapacidad' => $i<=30?$faker->text($maxNbChars = 30):null,
                'observaciones_incapacidad' => $i<=30?$faker->text($maxNbChars = 120):null,
                'lugar_incapacidad' => $i<=30?$faker->text($maxNbChars = 30):null,
            ));
        }
    }
}
