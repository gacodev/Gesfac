<?php

namespace App\Http\Controllers;

use App\alumno;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class exportcontroller extends Controller
{
    public function exportarmas(){
        return view('users.exports.armamento');
    }
    public function exportsanidad(){
        return view('users.exports.sanidad');
    }
    public function exportpersonal(){
//        return view('users.exports.personal');
        $listar = alumno::get();
        $pdf   = PDF::loadView('users.exports.personal', compact('listar'));
        return $pdf->setPaper('a4', 'landscape')->stream('personal.pdf');;
    }
}
