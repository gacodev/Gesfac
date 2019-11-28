<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\AlumnoVisitantes;
use App\Escuadron;
use App\Familiar;
use App\Sanidad;
use App\TipoDocumento;
use App\visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitanteController extends Controller
{

    public function visitantes()
    {
        $tipo_documentos = TipoDocumento::pluck("tipo", "id");

        $escuadrones = Escuadron::pluck("escuadron", "id");

        return view('registro_inv')
            ->with('escuadrones' ,$escuadrones)
            ->with('tipo_documentos' ,$tipo_documentos)
            ->with("success", request("success"));

    }

    public function create()
    {

        request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required',
            'escuadron' => 'required',
            'alumno' => 'required',
        ]);

        $visitante = visitante::create(
            [
                "tipo_documento" => request("tipo_documento"),
                "numero_documento" => request("numero_documento"),
                "nombre" => request("nombre"),
                "telefono" => request("telefono"),
                "alumno" => request("alumno")
            ]
        );

        if ($visitante) {
            return redirect()->action('VisitanteController@visitantes', ['success' => true]);
        }

        return redirect()->action('VisitanteController@visitantes', ['success' => false]);

    }

    public function ingreso(visitante $visitante)
    {

        $visitante = visitante::join('alumnos', 'alumnos.id', '=', 'visitantes.alumno')
            ->get([
                'alumnos.nombre AS alumno',
                'visitantes.nombre AS visitante',
                'visitantes.numero_documento AS visitante_numero_documento',
                'visitantes.telefono AS visitante_telefono',
            ]);

        return view('ingreso')->with('visitante',$visitante);
    }

    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

        visitante::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return redirect()->action('VisitanteController@ingreso');
    }


}
