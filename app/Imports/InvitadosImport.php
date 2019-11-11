<?php

namespace App\Imports;

use App\visitante;
use Maatwebsite\Excel\Concerns\ToModel;

class InvitadosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new visitante([
            'tipo_documento' => $row[0],
            'nombre_documento' => $row[1],
            'nombre' => $row[2],
            'telefono' => $row[3],

        ]);
    }
}
