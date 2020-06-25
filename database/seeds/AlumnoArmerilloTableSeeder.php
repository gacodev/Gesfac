<?php

use Illuminate\Database\Seeder;

class AlumnoArmerilloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        for ($i=0; $i < 25; $i++) {

            \DB::table('alumno_armerillo')->insert(array(
                'estado' => 1,
                'fusil' => $i+1,
                'alumno' => $i+1,
            ));

        }

    }
}
