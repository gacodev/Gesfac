<?php

namespace App\Http\Controllers;

use App\AlumnoVisitantes;
use App\Escuadron;
use App\TipoDocumento;
use App\visitante;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{

    public function visitantes()
    {
        $tipo_documentos = TipoDocumento::get();

        $escuadrones = Escuadron::all();

        return view('registro_inv')
            ->with('escuadrones' ,$escuadrones)
            ->with('tipo_documentos' ,$tipo_documentos)
            ->with("success", request("success"));

    }

    public function create()
    {
        $visitante = visitante::create(
            [
                "tipo_documento" => request("tipo_documento"),
                "numero_documento" => request("numero_documento"),
                "nombre" => request("nombre"),
                "telefono" => request("telefono")
            ]
        );

        $alumno_visitante = AlumnoVisitantes::create(
            [
                "alumno"=>request("alumnos"),
                "visitante"=>$visitante->id
            ]
        );

        if ($visitante && $alumno_visitante) {
            return redirect()->action('VisitanteController@visitantes', ['success' => true]);
        }

        return redirect()->action('VisitanteController@visitantes', ['success' => false]);

        return $visitante->id;

    }


}
