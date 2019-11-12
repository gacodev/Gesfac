<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i <= 60; $i++) {
            \DB::table('alumnos')->insert(array(
                'nombre' => $faker->name,
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->email,
                'direccion' => $faker->address,
                'numero_documento' => $faker->numberBetween(1000000000,1900000000),
                'escuadron' => $faker-> numberBetween(1,4),
                'tipo_documento' => $faker-> numberBetween(1,3)
            ));
        }
    }
}
