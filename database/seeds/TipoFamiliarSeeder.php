<?php

use App\TipoFamiliar;
use Illuminate\Database\Seeder;

class TipoFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tipo_familiar' => 'PADRE'],
            ['tipo_familiar' => 'MADRE'],
        ];

        foreach ($data as $registro) {
            TipoFamiliar::create($registro);
        }
    }
}
