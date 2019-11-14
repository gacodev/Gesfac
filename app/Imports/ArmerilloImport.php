<?php

namespace App\Imports;

use App\armerillo;
use Maatwebsite\Excel\Concerns\ToModel;

class ArmerilloImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new armerillo([
            'estado' => $row[1],
            'asignado' => $row[2],
            'fusil' => $row[3],
            'tipo_fusil' => $row[4],

        ]);

    }
}
