<?php

namespace App\Http\Controllers;

use App\Alumno;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class exportcontroller extends Controller
{
    public function exportarmas(){
        $listar = Alumno::get();

        $pdf   = PDF::loadView('users.exports.armamento', compact('listar'));
        return $pdf->setPaper('a4', 'landscape')->stream('armamento.pdf');
    }
    public function exportsanidad(){
        $listar = Alumno::get();

        $pdf   = PDF::loadView('users.exports.sanidad', compact('listar'));
        return $pdf->setPaper('a4', 'landscape')->stream('sanidad.pdf');
    }
    public function exportpersonal(){
//        return view('users.exports.personal');
        $listar = Alumno::get();
        $pdf   = PDF::loadView('users.exports.personal', compact('listar'));
        return $pdf->setPaper('a4', 'landscape')->stream('personal.pdf');
    }
}
