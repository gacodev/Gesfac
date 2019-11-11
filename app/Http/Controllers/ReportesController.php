<?php

namespace App\Http\Controllers;
use App\Imports\ArmerilloImport;
use App\Imports\InvitadosImport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function importarmas(Request $request){

        $file = $request->file('excel');
        Excel::import(new ArmerilloImport, $file);
        return back();
    }

    public function visitantes(Request $request){

        $file = $request->file('excel');
        Excel::import(new InvitadosImport, $file);
        return back();
    }
}
