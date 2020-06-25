<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Escuadron;
use App\Novedad;
use App\Sanidad;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class exportcontroller extends Controller
{
    public function exportarmas(){
        $listar = Alumno::get();

        $pdf   = PDF::loadView('users.exports.armamento', compact('listar'));
        return $pdf->setPaper('a4', 'landscape')->stream('armamento.pdf');
    }
    public function exportsanidad(){

        $date_now = Carbon::now()->format("Y-m-d");

        $incapacidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
            ->whereDate("sanidad.fecha_asignacion", "<=", $date_now)
            ->whereDate("sanidad.fecha_incapacidad", ">=", $date_now);

        $BRAVO = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
            ->whereDate("sanidad.fecha_asignacion", "<=", $date_now)
            ->whereDate("sanidad.fecha_incapacidad", ">=", $date_now)
            ->where("escuadrones.escuadron", "BRAVO")
            ->get(['sanidad.*',
                'alumnos.nombre AS alumno',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad.fecha_incapacidad AS fecha_incapacidad',
                'sanidad.observaciones_incapacidad AS observacion',
                'novedades.novedad AS novedad',
            ]);

        $ALFA = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
            ->whereDate("sanidad.fecha_asignacion", "<=", $date_now)
            ->whereDate("sanidad.fecha_incapacidad", ">=", $date_now)
            ->where("escuadrones.escuadron", "ALFA")
            ->get(['sanidad.*',
                'alumnos.nombre AS alumno',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad.fecha_incapacidad AS fecha_incapacidad',
                'sanidad.observaciones_incapacidad AS observacion',
                'novedades.novedad AS novedad',
            ]);

        $listar = Alumno::get();

        $pdf   = PDF::loadView('users.exports.sanidad', compact('ALFA', 'BRAVO'));
        return $pdf->setPaper('a4', 'landscape')->stream('sanidad.pdf');
    }
    public function exportpersonal(){

        $novedades = novedad::pluck('id', 'novedad');
        $escuadrones = Escuadron::pluck('escuadron');

        foreach ($novedades as $key => $novedad) $novedades[$key] = 0;

        $novedades_escuadrones = [];

        foreach ($escuadrones as $escuadron){
            $novedades_escuadrones[$escuadron] = clone $novedades;

            $filtrar_novedades = Alumno::leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
                ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
                ->where('escuadrones.escuadron', '=', $escuadron);

            foreach ($filtrar_novedades->get(["novedades.novedad AS novedad"]) as $index)
                $novedades_escuadrones[$escuadron][$index->novedad] +=1;

            $novedades_escuadrones[$escuadron]["TOTAL"]=$filtrar_novedades->count();
            $novedades_escuadrones[$escuadron]["TOTAL_NOVEDADES"]=$filtrar_novedades->count()-$novedades_escuadrones[$escuadron]["NINGUNA"];

        }

        $pdf   = PDF::loadView('users.exports.personal', compact('novedades_escuadrones'));
        return $pdf->setPaper('a4', 'landscape')->stream('personal.pdf');
    }

     public function acta()
    {
        $pdf   = PDF::loadView('users.exports.acta', compact('users'));
        return $pdf->setPaper('letter', 'portrait')->download('acta.pdf');
    }
}
