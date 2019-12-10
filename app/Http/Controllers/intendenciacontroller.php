<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\ArticuloIntendencia;
use App\Escuadron;
use App\Intendencia;
use Illuminate\Http\Request;

class intendenciacontroller extends Controller
{
    public function index()
    {
        $escuadrones = Escuadron::pluck("escuadron", "id");

        $alumnos = [];
        $articulos = [];

        if(request('escuadron')){
            $alumnos = Alumno::where("alumnos.escuadron", "=", \request('escuadron'))
                ->pluck("alumnos.nombre", "alumnos.id");
        }

        if(\request("alumno")){
            $articulos_original = ArticuloIntendencia::leftJoin("intendencia", "intendencia.articulo", "=", "articulo_intendencia.id")
                ->where("alumno", "=", \request("alumno"))
                ->get([
                    "articulo_intendencia.articulo AS articulo",
                    "articulo_intendencia.id AS id",
                    "intendencia.descripcion AS descripcion",
                    "intendencia.cantidad AS cantidad",
                ]);

            $articulos = ArticuloIntendencia::get([
                "articulo_intendencia.articulo AS articulo",
                "articulo_intendencia.id AS id",
            ]);

            $articulos = $articulos->merge($articulos_original);


        }else{
            $articulos = ArticuloIntendencia::get([
                    "articulo_intendencia.articulo AS articulo",
                    "articulo_intendencia.id AS id",
                ]);
        }

        return view('intendencia')
            ->with("escuadrones", $escuadrones)
            ->with("alumnos", $alumnos)
            ->with("articulos", $articulos)
            ->with("request", request());

    }

    public function post_intendencia_articulo()
    {

        $data = explode(":", request("id"));
        $alumno = $data[1];
        $articulo = $data[2];
        $value = \request("value");
        $campo = NULL;

        if($data[0]==="quantity") $campo = "cantidad";
        elseif($data[0]==="description") $campo = "descripcion";

        $intendencia = Intendencia::where("alumno", "=", $alumno)
            ->where("articulo", "=", $articulo);

        if($intendencia->count() && $campo){
            $intendencia->update([
                $campo => $value
            ]);
        }

        else{
            $intendencia = Intendencia::create([
                "alumno" => $alumno,
                "articulo" => $articulo,
                $campo => $value,
            ]);
        }

        return explode(":", request("id"));
    }
}
