<?php

use Illuminate\Database\Seeder;
use App\TipoDocumento;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documento')
            ->insert(
                [
                    [
                        'tipo' => 'CEDULA DE CIUDADANIA',
                    ],
                    [
                        'tipo' => 'TARGETA DE IDENTIDAD',
                    ],
                    [
                        'tipo' => 'CEDULA EXTRANJERA',
                    ],
                ]
            );
    }
}
