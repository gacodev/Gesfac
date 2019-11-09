<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArmerilloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i=1; $i < 60; $i++) {

            $asignado = $i > 30 ? 0 : 1;

            DB::table('armerillo')->insert(array(
                'fusil' => $faker->unique()->numberBetween(345678,999999),
                'estado' => $faker->numberBetween(0,1),
                'asignado' => $asignado,
                'tipo_fusil' =>$faker-> numberBetween(1,3)
            ));
        }
    }
}
