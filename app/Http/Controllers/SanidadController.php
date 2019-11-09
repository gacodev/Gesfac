<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Escuadron;
use App\Sanidad;
use App\SanidadAsignar;
use App\SanidadIncapacidad;
use App\SanidadSolicitar;
use App\TipoCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SanidadController extends Controller
{
    public function index()
    {
        $sanidad = SanidadSolicitar::join('alumnos', 'sanidad_solicitar.alumno', '=', 'alumnos.id')
            ->leftJoin('tipo_cita', 'sanidad_solicitar.tipo_cita', '=', 'tipo_cita.id')
            ->join('sanidad_asignar', 'sanidad_asignar.solicitud', '=', 'sanidad_solicitar.id')
            ->where("sanidad_asignar.asistencia", "=", 0)
            ->get(['sanidad_solicitar.*',
                'alumnos.*',
                'sanidad_solicitar.id AS cita',
                'sanidad_asignar.fecha_asignacion AS fecha_asignacion',
                'sanidad_asignar.asistencia AS asistencia',
                'tipo_cita.tipo_cita AS tipo_cita'
            ]);

        return view('sanidad')->with("citas", $sanidad)
            ->with("success", request("success"));
    }

    public function agendarCita()
    {
        $escuadrones = Escuadron::all();
        $tipo_citas = TipoCita::all();

        $sanidad = SanidadSolicitar::join('alumnos', 'sanidad_solicitar.alumno', '=', 'alumnos.id')
            ->leftJoin('tipo_cita', 'sanidad_solicitar.tipo_cita', '=', 'tipo_cita.id')
            ->where('sanidad_solicitar.estado','=', 0)
            ->get(['sanidad_solicitar.*',
                'alumnos.*',
                'sanidad_solicitar.id AS cita',
                'tipo_cita.tipo_cita AS tipo_cita',
            ]);

        return view('agendar_cita')->with("citas", $sanidad)
            ->with("success", request("success"))
            ->with("escuadrones", $escuadrones)
            ->with("tipo_citas", $tipo_citas)
            ->with("fecha_solicitud", Carbon::now()->format('Y-m-d'));
    }



    public function  informes(){

        $date_now = Carbon::now()->format("Y-m-d");

        $incapacidad = SanidadIncapacidad::join('sanidad_asignar', 'sanidad_asignar.id', '=', 'sanidad_incapacidad.asignacion')
            ->join('sanidad_solicitar', 'sanidad_solicitar.id', '=', 'sanidad_asignar.solicitud')
            ->leftjoin('alumnos', 'sanidad_solicitar.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad_solicitar.tipo_cita', '=', 'tipo_cita.id')
            ->where("sanidad_asignar.fecha_asignacion", "<=", $date_now)
            ->get(['sanidad_solicitar.*',
                'alumnos.nombre AS alumno',
                'sanidad_asignar.fecha_asignacion AS fecha_asignacion',
                'sanidad_incapacidad.id AS incapacidad',
                'sanidad_incapacidad.excusado AS excusado',
                'sanidad_incapacidad.fecha_incapacidad AS fecha_incapacidad',
                'sanidad_incapacidad.observaciones AS observacion',
                'escuadrones.escuadron AS escuadron',
            ]);

        $fecha_actual = Carbon::now()->format("Y-m-d");

        for($i=0;$i<sizeof($incapacidad);$i++){

            $fecha_asignacion = Carbon::parse($incapacidad[$i]["fecha_asignacion"]);
            $fecha_incapacidad = Carbon::parse($incapacidad[$i]["fecha_incapacidad"]);

            $incapacidad[$i]["dias_incapacidad"]=$fecha_incapacidad->diffInDays($fecha_asignacion)+1;
            $incapacidad[$i]["dias_restantes"]=$fecha_incapacidad->diffInDays($fecha_actual)+1;
        }

        return view('informes')->with("informes",$incapacidad)
            ->with("fecha", Carbon::now()->format('Y-m-d'));

    }
    public function informacionSolicitudCita()
    {
        $sanidad = SanidadSolicitar::join('alumnos', 'sanidad_solicitar.alumno', '=', 'alumnos.id')
            ->leftJoin('tipo_cita', 'sanidad_solicitar.tipo_cita', '=', 'tipo_cita.id')
            ->where("sanidad_solicitar.id", "=", request("id"))
            ->get(['sanidad_solicitar.*',
                'alumnos.*',
                'sanidad_solicitar.id AS cita',
                'tipo_cita.tipo_cita AS tipo_cita',
            ])[0];

        return $sanidad;

    }

    public function asignar_cita()
    {

        $sanidad_asignar = new SanidadAsignar;

        $sanidad_solicitar = SanidadSolicitar::find(request("cita"));

        DB::transaction(function () use ($sanidad_asignar, $sanidad_solicitar) {

            $sanidad_solicitar->update([
                "estado" => 1
            ]);

            $sanidad_asignar->solicitud = request("cita");
            $sanidad_asignar->fecha_asignacion = request("fecha_asignacion");
//            $sanidad_asignar->doctor = request("doctor");

            $sanidad_asignar->save();

        });

        if ($sanidad_asignar) return redirect()->action('SanidadController@agendarCita', ['success' => true]);

        return redirect()->action('SanidadController@agendarCita', ['success' => false]);
    }

    public function create()
    {

        $alumno = request("agendar_alumno");
        $tipo_cita = request("agendar_tipo_cita");
        $motivo = request("motivo")?request("motivo"):"";
        $descripcion = request("agendar_descripcion") ? request("agendar_descripcion") : "";

        if ($alumno && $tipo_cita) {

            $sanidad_solicitar = new SanidadSolicitar;

            $sanidad_solicitar->alumno = $alumno;
            $sanidad_solicitar->tipo_cita = $tipo_cita;
            $sanidad_solicitar->descripcion = $descripcion;
            $sanidad_solicitar->motivo = $motivo;
            $sanidad_solicitar->fecha_solicitud = Carbon::now();

            $sanidad_solicitar->save();

            return redirect()->action('SanidadController@agendarCita', ['success' => true]);
        }

        return redirect()->action('SanidadController@agendarCita', ['success' => false]);

    }

    public function atendido()
    {
        $sanidad = SanidadSolicitar::join('alumnos', 'sanidad_solicitar.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad_solicitar.tipo_cita', '=', 'tipo_cita.id')
            ->join('sanidad_asignar', 'sanidad_asignar.solicitud', '=', 'sanidad_solicitar.id')
            ->where('sanidad_solicitar.id',"=", request("cita"))
            ->get(['sanidad_solicitar.*',
                'alumnos.*',
                'sanidad_solicitar.id AS cita',
                'escuadrones.escuadron AS escuadron',
                'sanidad_solicitar.fecha_solicitud AS fecha_solicitud',
                'sanidad_asignar.fecha_asignacion AS fecha_asignacion',
                'sanidad_asignar.asistencia AS asistencia',
                'tipo_cita.tipo_cita AS tipo_cita'
            ])->first();

        $min_date = Carbon::parse($sanidad->fecha_asignacion)->format("Y-m-d");
        $max_date = Carbon::parse($sanidad->fecha_asignacion)->addDay(30)->format("Y-m-d");

        return view("atendido")->with("sanidad", $sanidad)
            ->with("fecha_minima",$min_date)
            ->with("fecha_maxima",$max_date);
    }

    public function registrar_atencion_citas()
    {
        $min_date = Carbon::now()->format("Y-m-d");
        $max_date = Carbon::now()->addDay(30)->format("Y-m-d");
        $fecha_incapacidad = \request("fecha_incapacidad");

        $atendido = SanidadAsignar::where("sanidad_asignar.solicitud", "=", request("cita"));

        $fecha_asignacion = $atendido->get()->first()->fecha_asignacion;

        if($fecha_incapacidad &&
            $fecha_incapacidad >= $min_date &&
            $fecha_incapacidad <= $max_date &&
            $fecha_incapacidad >= $fecha_asignacion ){

            $incapacidad = new  SanidadIncapacidad;

            DB::transaction(function () use ($atendido, $incapacidad) {

                $atendido->update([
                    "asistencia"=>1
                ]);

                $incapacidad->asignacion = $atendido->get()->first()->id;
                $incapacidad->fecha_incapacidad = \request("fecha_incapacidad");
                $incapacidad->observaciones = \request("observaciones");
                $incapacidad->motivo = \request("motivo");
                $incapacidad->lugar = \request("lugar");
                $incapacidad->excusado = \request("excusado");

                $incapacidad->save();

            });

            return redirect()->action('SanidadController@index', ['success' => true]);
        }

        return redirect()->action('SanidadController@index', ['success' => false]);


    }
}
