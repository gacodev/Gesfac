<?php

use Illuminate\Database\Seeder;
use App\Escuadron;

class EscuadronTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('escuadrones')
            ->insert(
                [
                    [
                        'escuadron' => 'ALFA',
                    ],
                    [
                        'escuadron' => 'DELTA',
                    ],
                    [
                        'escuadron' => 'BRAVO',
                    ],
                    [
                        'escuadron' => 'CHARLIE',
                    ]
                ]
            );
    }

}
