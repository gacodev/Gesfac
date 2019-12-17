<?php

namespace App\Imports;
use App\visitante;
use App\Alumno;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithChunkReading, WithValidation};
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;


class InvitadosImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnFailure, SkipsOnError
{

    use Importable, SkipsFailures, SkipsErrors;

    public function model(array $row)
    {

        return new visitante([
            'tipo_documento'=> 1,
            'numero_documento' => $row["identificacion_visitante"],
            'nombre' => $row["nombre_visitante"],
            'parentesco' => $row["parentesco"],
            'alumno' => $this->alumno($row["nombre_alumno"]),
        ]);
    }

    public function alumno($alumno)
    {

        $output_alumno = Alumno::where("nombre", $alumno);

        return $output_alumno->count()? $output_alumno->first()->id : 1;

    }

    public function rules():array
    {
        return [
            'identificacion_visitante' => Rule::unique("visitantes", "numero_documento"),
            'nombre_visitante' => 'required',
            'nombre_alumno' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'identificacion_visitante.unique' => 'El número de documento ya esta en uso',
        ];
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 10;
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
