<?php

namespace App\Http\Controllers;
use App\AlumnoArmerillo;
use App\armerillo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class ArmerilloController extends Controller
{
    public function weaponAvailable()
    {

        $armerillo = armerillo::where('asignado', '=', 0)
            ->get();

        return $armerillo;
    }

    public function reportar(Request $request)
    {
        return view('welcome');
    }


}
