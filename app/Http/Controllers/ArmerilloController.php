<?php

namespace App\Http\Controllers;

use App\AlumnoArmerillo;
use App\armerillo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArmerilloController extends Controller
{
    public function weaponAvailable()
    {

        $armerillo = armerillo::where('asignado', '=', 0)
            ->get();

        return $armerillo;
    }

}
