<?php

namespace App\Http\Controllers;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class actacontroller extends Controller
{
    public function acta()
    {
        $users = User::get();
        $pdf   = PDF::loadView('users.exports.acta', compact('users'));
        return $pdf->setPaper('a4', 'landscape')->download('acta.pdf');
    }
}
