<?php

namespace App\Imports;
use App\visitante;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;


class InvitadosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        return new visitante([
            'tipo_documento'=>    $row[0],
            'numero_documento' => $row[1],
            'nombre' =>           $row[2],
            'telefono' =>           $row[3],


        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
