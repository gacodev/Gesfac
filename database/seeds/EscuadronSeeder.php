<?php

use Illuminate\Database\Seeder;
use App\Escuadron;

class EscuadronSeeder extends Seeder
{

    public function run()
    {
        $inserted = DB::table('table_escuadrones')
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
