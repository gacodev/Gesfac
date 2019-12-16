<?php

namespace App\Imports;
use App\Alumno;
use App\visitante;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};


class AlumnosImport implements ToModel, WithHeadingRow
{

    use Importable;

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

    public function rules()
    {
        return [
            'numero_documento' => 'regex:/[0-9]/',
            'telefono' => 'regex:/[0-9]/'
        ];
    }
}
