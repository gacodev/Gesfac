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

        for ($i=1; $i <= 80; $i++) {

            $fecha_asignacion = null;
            $fecha_solicitud = null;
            $fecha_incapacidad = null;
            $asistencia = 0;
            $estado = 0;

            if ($i<=20){
                $fecha_asignacion = Carbon::now()->subDay(1);
                $fecha_solicitud = Carbon::now()->subDay(10);
                $fecha_incapacidad = Carbon::now()->addDay(2);
                $asistencia = 1;
                $estado = 1;
            }

            elseif($i>20 && $i<=40 ){
                $fecha_asignacion = $date;
                $fecha_solicitud = Carbon::now()->subDay(5);
                $asistencia = 0;
                $estado = 1;
            }

            elseif($i>40 && $i<=60 ){
                $fecha_asignacion = null;
                $fecha_solicitud = $date;
                $asistencia = 0;
                $estado = 1;
            }


            \DB::table('sanidad')->insert(array(
                'alumno' => $i,
                'estado' => $estado,
                'asignado' => $i<=40?1:0,
                'tipo_cita' => $i<=60?$faker->numberBetween(2,4):1,
                'motivo' => $i<=60?$faker->text($maxNbChars = 30):null,
                'descripcion' => $i<=60?"Descripcion de la cita":null,
                'fecha_solicitud' => $fecha_solicitud,
                'fecha_asignacion' => $fecha_asignacion,
                'asistencia' => $asistencia,
                'fecha_incapacidad' => $i<=20?$fecha_incapacidad:null,
                'motivo_incapacidad' => $i<=20?$faker->text($maxNbChars = 30):null,
                'observaciones_incapacidad' => $i<=20?$faker->text($maxNbChars = 120):null,
                'lugar_incapacidad' => $i<=20?$faker->text($maxNbChars = 30):null,
            ));
        }
    }
}
