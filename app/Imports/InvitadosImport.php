<?php

namespace App\Imports;
use App\Alumno;
use App\visitante;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};


class InvitadosImport implements ToModel, WithHeadingRow
{

    use Importable;

    public function model(array $row)
    {

        $user = Alumno::where("nombre", "COMANDO")
            ->whereNull('numero_documento')
            ->first();

        return new visitante([
            'tipo_documento'=> 1,
            'numero_documento' => $row["numero_documento"],
            'nombre' => $row["nombre"],
            'telefono' => $row["telefono"],
            'alumno' => $user->id,
        ]);
    }

    public function rules()
    {
        return [
            'numero_documento' => 'regex:/[0-9]/',
            'telefono' => 'regex:/[0-9]/'
        ];
    }
}
