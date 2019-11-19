<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Escuadron;
use App\Sanidad;
use App\SanidadNovedad;
use App\TipoCita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SanidadController extends Controller
{
    public function index()
    {
        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
//            ->where("sanidad.asistencia", "=", 0)
            ->where("sanidad.estado", "=", 1)
//            ->whereNotNull('fecha_asignacion')
            ->get(['sanidad.*',
                'alumnos.*',
                'sanidad.id AS cita',
                'escuadrones.escuadron AS escuadron',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad.asistencia AS asistencia',
                'tipo_cita.tipo_cita AS tipo_cita'
            ]);

        return view('sanidad')->with("citas", $sanidad)
            ->with("success", request("success"));
    }

    public function sanidad_registrar_solicitud()
    {

        $escuadrones = Escuadron::pluck('escuadron', 'id');
        $tipo_citas = TipoCita::pluck('tipo_cita', 'id');

        return view('sanidad.registrar_solicitud')
            ->with("escuadrones", $escuadrones)
            ->with("tipo_cita", $tipo_citas)
            ->with("fecha_solicitud", Carbon::now()->format('Y-m-d'));
    }

    public function sanidad_registro_agendar_cita()
    {
        $min_date = Carbon::now()->format("Y-m-d");
        $max_date = Carbon::now()->addDay(30)->format("Y-m-d");

        $cita = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
        ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
        ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
        ->where("sanidad.id", "=", \request("cita"))
        ->get(
            [
                "sanidad.id AS cita",
                "sanidad.fecha_solicitud AS fecha_solicitud",
                "alumnos.nombre AS alumno",
                "escuadrones.escuadron AS escuadron",
                "tipo_cita.tipo_cita AS tipo_cita",
            ]
        )
        ->first();

        return view('sanidad.registro_agendar_cita')
            ->with("cita", $cita)
            ->with("min_date", $min_date)
            ->with("max_date", $max_date);
    }

    public function post_sanidad_registro_agendar_cita()
    {

        request()->validate([
            'fecha_asignacion' => 'required',
        ]);


        $cita = Sanidad::where("sanidad.id", "=", \request("cita"))
            ->update(
                [
                   "estado"=>1,
                   "fecha_asignacion"=>\request("fecha_asignacion"),
                ]
            );

        return redirect()->route('sanidad', ['success' => true]);
    }

    public function agendarCita()
    {

        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->where('sanidad.estado','=', 0)
            ->get(['sanidad.*',
                'alumnos.*',
                'sanidad.id AS cita',
                'tipo_cita.tipo_cita AS tipo_cita',
                "escuadrones.escuadron AS escuadron",
            ]);

        return view('agendar_cita')->with("citas", $sanidad)
            ->with("success", request("success"));
    }



    public function  informes(){

        $date_now = Carbon::now()->format("Y-m-d");

        $incapacidad = SanidadNovedad::join('sanidad', 'sanidad.id', '=', 'sanidad_novedad.cita')
            ->leftjoin('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->whereDate("sanidad.fecha_asignacion", "<=", $date_now)
            ->whereDate("sanidad_novedad.fecha_novedad", ">=", $date_now)
            ->get(['sanidad.*',
                'alumnos.nombre AS alumno',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad_novedad.id AS novedad',
                'sanidad_novedad.excusado AS excusado',
                'sanidad_novedad.fecha_novedad AS fecha_novedad',
                'sanidad_novedad.observaciones AS observacion',
                'escuadrones.escuadron AS escuadron',
            ]);

        $fecha_actual = Carbon::now()->format("Y-m-d");

        for($i=0;$i<sizeof($incapacidad);$i++){

            if($incapacidad[$i]["excusado"]) {

                $fecha_asignacion = Carbon::parse($incapacidad[$i]["fecha_asignacion"]);
                $fecha_novedad = Carbon::parse($incapacidad[$i]["fecha_novedad"]);

                $incapacidad[$i]["dias_novedad"] = $fecha_novedad->diffInDays($fecha_asignacion) + 1;
                $incapacidad[$i]["dias_restantes"] = $fecha_novedad->diffInDays($fecha_actual) + 1;
            }
            else{
                $incapacidad[$i]["dias_novedad"] = 0;
                $incapacidad[$i]["dias_restantes"] = 0;
            }
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

        $sanidad_asignar = new Sanidad;

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

    public function create(Request $request)
    {

        request()->validate([
            'alumno' => 'required',
            'tipo_cita' => 'required',
            'motivo' => 'required',
        ]);


        $alumno = request("alumno");
        $tipo_cita = request("tipo_cita");
        $motivo = request("motivo")?request("motivo"):"";
        $descripcion = request("descripcion") ? request("descripcion") : "";


        $sanidad_solicitar = new Sanidad;

        $sanidad_solicitar->alumno = $alumno;
        $sanidad_solicitar->tipo_cita = $tipo_cita;
        $sanidad_solicitar->descripcion = $descripcion;
        $sanidad_solicitar->motivo = $motivo;
        $sanidad_solicitar->fecha_solicitud = Carbon::now();

        $sanidad_solicitar->save();

        return redirect()->action('SanidadController@agendarCita', ['success' => true]);


    }

    public function atendido()
    {
        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->where('sanidad.id',"=", request("cita"))
            ->get(['sanidad.*',
                'alumnos.*',
                'sanidad.id AS cita',
                'escuadrones.escuadron AS escuadron',
                'sanidad.fecha_solicitud AS fecha_solicitud',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad.asistencia AS asistencia',
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

        $atendido = Sanidad::where("sanidad_asignar.solicitud", "=", request("cita"));

        $fecha_asignacion = $atendido->get()->first()->fecha_asignacion;

        if($fecha_incapacidad &&
            $fecha_incapacidad >= $min_date &&
            $fecha_incapacidad <= $max_date &&
            $fecha_incapacidad >= $fecha_asignacion ){

            $incapacidad = new  SanidadNovedad;

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
