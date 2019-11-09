<?php

use Illuminate\Database\Seeder;

class TipoCitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cita')
            ->insert(
                [
                    [
                        'tipo_cita' => 'MEDICINA GENERAL',
                    ],
                    [
                        'tipo_cita' => 'ODONTOLOGIA',
                    ],
                    [
                        'tipo_cita' => 'ESPECIALISTA',
                    ],

                ]
            );
    }
}
