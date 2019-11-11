<?php

namespace App\Http\Controllers;

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
return view('users.exports.personal');
    }
}
