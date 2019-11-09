<?php

use Illuminate\Database\Seeder;

class TipoFusilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_fusil')
            ->insert(
                [
                    [
                        'tipo' => 'NORINCO',
                    ],
                    [
                        'tipo' => 'M16',
                    ],
                    [
                        'tipo' => 'GALIL',
                    ]
                ]
            );
    }
}
