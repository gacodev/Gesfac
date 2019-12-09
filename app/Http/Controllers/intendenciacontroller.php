<?php

namespace App\Http\Controllers;

use App\ArticuloIntendencia;
use App\Escuadron;
use Illuminate\Http\Request;

class intendenciacontroller extends Controller
{
    public function index()
    {
        $escuadrones = Escuadron::pluck("escuadron", "id");

        $articulos = ArticuloIntendencia::leftJoin("intendencia", "intendencia.articulo", "=", "articulo_intendencia.id")
            ->get([
               "articulo_intendencia.articulo AS articulo",
               "articulo_intendencia.id AS articulo_id",
               "intendencia.id AS id",
               "intendencia.descripcion AS descripcion",
               "intendencia.cantidad AS cantidad",
            ]);

        return view('intendencia')
            ->with("escuadrones", $escuadrones)
            ->with("articulos", $articulos);

    }
}
