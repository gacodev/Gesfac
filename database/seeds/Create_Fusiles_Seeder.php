<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Create_Fusiles_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
            \DB::table('alumnos')->insert(array(
                'nombre' => $faker->name,
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->email,
                'direccion' => $faker->address,
                'cedula' => $faker->randomDigit,
                'escuadron' => $faker->randomDigit(0,1),
            ));
        }
    }
}
