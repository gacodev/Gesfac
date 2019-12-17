<?php

namespace App\Http\Controllers;
use App\Alumno;
use App\Escuadron;
use App\Imports\AlumnosImport;
use App\Imports\ArmerilloImport;
use App\Imports\InvitadosImport;


use App\Sanidad;
use App\TipoDocumento;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function importarmas(Request $request){

        $file = $request->file('excel');
        Excel::import(new ArmerilloImport, $file);
        return back();
    }

    public function visitantes(Request $request){

        $file = $request->file('excel');

        $import = new InvitadosImport();
        $import->import($file);

        $alumnos = Alumno::all();

        $data = [
            ['tipo_familiar' => 'PADRE'],
            ['tipo_familiar' => 'MADRE'],
        ];

        foreach ($alumnos as $alumno) {

            if(!Sanidad::where("alumno", $alumno->id)->count()){
                Sanidad::create([
                   "alumno" => $alumno->id
                ]);
            }
        }

        return redirect()->route('registro_inv')->with('failures', $import->failures());
    }

    public function import_alumnos(Request $request){

        $data = [
            'escuadron' => $request["excel_escuadron"],
        ];

        $file = $request->file('excel');

        $import = new AlumnosImport($data);
        $import->import($file);

//        dd($import->errors());

        return redirect()->route('registrar_alumno')->with('failures', $import->failures());

    }
}
