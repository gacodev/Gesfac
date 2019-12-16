<?php

namespace App\Imports;
use App\Alumno;
use App\visitante;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithChunkReading};


class InvitadosImport implements ToModel, WithHeadingRow, WithChunkReading
{

    use Importable;

    public function model(array $row)
    {

        return new visitante([
            'tipo_documento'=> 1,
            'numero_documento' => $row["identificacion_visitante"],
            'nombre' => $row["nombre_visitante"],
            'telefono' => $row["telefono_visitante"],
            'alumno' => $this->alumno($row["identificacion_alumno"]),
        ]);
    }

    public function alumno($alumno)
    {
        $output_alumno = NULL;

        if($alumno == 0){
            $output_alumno = Alumno::where("nombre", "COMANDO")
                ->whereNull('numero_documento')
                ->first()->id;
        }
        else{
            $output_alumno = Alumno::where("numero_documento", $alumno)
                ->first()->id;
        }

        return $output_alumno;

    }

    public function rules()
    {
        return [
            'numero_documento' => 'regex:/[0-9]/',
            'telefono' => 'regex:/[0-9]/'
        ];
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
