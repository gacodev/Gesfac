<?php

namespace App\Imports;
use App\Alumno;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow, WithChunkReading, WithValidation};
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;


class AlumnosImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation, SkipsOnFailure, SkipsOnError
{

    use Importable, SkipsFailures, SkipsErrors;

    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function model(array $row)
    {

        return new Alumno([
            'tipo_documento' => $this->tipo_documento($row["tipo_documento"]),
            'numero_documento' => $row["numero_documento"],
            'nombre' => $row["nombre"],
            'escuadron' => $this->data["escuadron"],
        ]);

    }

    public function tipo_documento($tipo_documento)
    {
        $output_tipo_documento = strtoupper(str_replace(".", "", $tipo_documento));

        if($output_tipo_documento == "CC")  return 1;
        elseif($output_tipo_documento == "TI")  return 2;
        elseif($output_tipo_documento == "CE")  return 3;

    }

    public function rules():array
    {
        return [
            'tipo_documento' => Rule::in(["C.C.", "C.C", "CC", "T.I.", "T.I", "TI", "C.E.", "C.E", "CE"]),
            'numero_documento' => 'required|unique:alumnos',
            'nombre' => 'required',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'tipo_documento.in' => 'Los tipos de documentos válidos son C.C. T.T. C.E. en la columna TIPO DOCUMENTO',
            'numero_documento.unique' => 'El número de documento ya esta en uso',
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
