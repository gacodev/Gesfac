<?php

use App\visitante;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VisitanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 50; $i++) {
            visitante::create([
                'alumno' => $i,
                'nombre' => $faker->name,
                'telefono' => $faker->phoneNumber,
                'numero_documento' => $faker->numberBetween(1000000000,1900000000),
                'tipo_documento' => $faker-> numberBetween(1,3)
            ]);
        }
    }
}

