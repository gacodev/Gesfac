<?php

namespace App\Http\Controllers;
use App\Escuadron;
use App\Imports\AlumnosImport;
use App\Imports\ArmerilloImport;
use App\Imports\InvitadosImport;


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
