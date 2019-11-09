<?php

use Illuminate\Database\Seeder;

class AlumnoVisitantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
            \DB::table('alumno_visitantes')->insert(array(
                'alumno' => $i+1,
                'visitante' => $i+1,
            ));
        }
    }
}
