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
        $date_now = Carbon::now();

        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->where("sanidad.asignado", "=", 1)
            ->get([
                'alumnos.*',
                'sanidad.id AS cita',
                'escuadrones.escuadron AS escuadron',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'sanidad.fecha_solicitud AS fecha_solicitud',
                'sanidad.asistencia AS asistencia',
                'tipo_cita.tipo_cita AS tipo_cita'
            ]);

        return view('sanidad.sanidad')->with("citas", $sanidad)
            ->with("success", request("success"));
    }

    public function sanidad_registrar_solicitud()
    {
        $tipo_citas = TipoCita::pluck('tipo_cita', 'id');

        $cita = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->where("sanidad.id", "=", \request("cita"))
            ->get(
                [
                    "sanidad.id AS cita",
                    "alumnos.nombre AS alumno",
                    "escuadrones.escuadron AS escuadron",
                ]
            )
            ->first();

        return view('sanidad.formularios.registrar_solicitud')
            ->with("tipo_cita", $tipo_citas)
            ->with("cita", $cita)
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

        return view('sanidad.formularios.registro_agendar_cita')
            ->with("cita", $cita)
            ->with("min_date", $min_date)
            ->with("max_date", $max_date);
    }

    public function post_sanidad_registro_agendar_cita()
    {

        $min_date = Carbon::now()->subDay(1);
        $max_date = Carbon::now()->addDay(30);

        request()->validate([
            'fecha_asignacion' => 'required|date|after:'.$min_date.'|before:'.$max_date,
        ]);

        $cita = Sanidad::where("sanidad.id", "=", \request("cita"))
            ->update(
                [
                    "asignado"=>1,
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
            ->where('sanidad.estado','=', 1)
            ->where('sanidad.asignado','=', 0)
            ->get(['sanidad.*',
                'alumnos.*',
                'sanidad.id AS cita',
                'tipo_cita.tipo_cita AS tipo_cita',
                "escuadrones.escuadron AS escuadron",
            ]);

        return view('sanidad.agendar_cita')->with("citas", $sanidad)
            ->with("success", request("success"));
    }

    public function solicitar_cita()
    {

        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->where('sanidad.estado','=', false)
            ->get([
                'alumnos.*',
                'sanidad.id AS cita',
                'tipo_cita.tipo_cita AS tipo_cita',
                "escuadrones.escuadron AS escuadron",
            ]);

        return view('sanidad.solicitar_cita')->with("citas", $sanidad)
            ->with("success", request("success"));
    }



    public function  informes(){

        $date_now = Carbon::now()->format("Y-m-d");

        $incapacidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->leftJoin('escuadrones', 'alumnos.escuadron', '=', 'escuadrones.id')
            ->leftJoin('tipo_cita', 'sanidad.tipo_cita', '=', 'tipo_cita.id')
            ->whereDate("sanidad.fecha_asignacion", "<=", $date_now)
            ->whereDate("sanidad.fecha_incapacidad", ">=", $date_now)
            ->get(['sanidad.*',
                'alumnos.nombre AS alumno',
                'sanidad.fecha_asignacion AS fecha_asignacion',
                'alumnos.excusado AS excusado',
                'sanidad.fecha_incapacidad AS fecha_incapacidad',
                'sanidad.observaciones_incapacidad AS observacion',
                'escuadrones.escuadron AS escuadron',
            ]);

        $fecha_actual = Carbon::now()->format("Y-m-d");

        for($i=0;$i<sizeof($incapacidad);$i++){

            if($incapacidad[$i]["excusado"]) {

                $fecha_asignacion = Carbon::parse($incapacidad[$i]["fecha_asignacion"]);
                $fecha_incapacidad = Carbon::parse($incapacidad[$i]["fecha_incapacidad"]);

                $incapacidad[$i]["dias_novedad"] = $fecha_incapacidad->diffInDays($fecha_asignacion) + 1;
                $incapacidad[$i]["dias_restantes"] = $fecha_incapacidad->diffInDays($fecha_actual) + 1;
            }
            else{
                $incapacidad[$i]["dias_novedad"] = 0;
                $incapacidad[$i]["dias_restantes"] = 0;
            }
        }

        return view('sanidad.informes')->with("informes",$incapacidad)
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
            'cita' => 'required',
            'tipo_cita' => 'required',
            'motivo' => 'required',
        ]);

        $cita = Sanidad::where("sanidad.id", "=", \request("cita"))
            ->update(
                [
                    "estado"=>1,
                    "fecha_solicitud"=>Carbon::now(),
                    "motivo"=>$request["motivo"],
                    "descripcion"=>$request["descripcion"]?$request["descripcion"]:"",
                    "tipo_cita"=>$request["tipo_cita"],
                ]
            );

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
                'sanidad.fecha_incapacidad AS fecha_incapacidad',
                'sanidad.lugar_incapacidad AS lugar_incapacidad',
                'sanidad.motivo_incapacidad AS motivo_incapacidad',
                'sanidad.observaciones_incapacidad AS observaciones_incapacidad',
                'tipo_cita.tipo_cita AS tipo_cita',
                'alumnos.excusado AS excusado'
            ])->first();

        $min_date = Carbon::parse($sanidad->fecha_asignacion)->format("Y-m-d");
        $max_date = Carbon::parse($sanidad->fecha_asignacion)->addDay(30)->format("Y-m-d");

        return view("sanidad.formularios.atendido")->with("sanidad", $sanidad)
            ->with("fecha_minima",$min_date)
            ->with("fecha_maxima",$max_date);
    }

    public function registrar_atencion_citas()
    {
        $min_date = Carbon::now()->subDay(1);
        $max_date = Carbon::now()->addDay(30);
//        $max_date_2 = Carbon::now()->addDay(1);

        request()->validate([
            'fecha_incapacidad' => 'required|date|after:'.$min_date.'|before:'.$max_date,
            'motivo_incapacidad' => 'required',
            'lugar_incapacidad' => 'required',
            'observaciones_incapacidad' => 'required',
            'excusado' => 'required',
            'cita' => 'required',
//            'fecha_asignacion' => 'required|date|after:'.$min_date.'|before:'.$max_date_2,
        ]);

        $date_now = Carbon::now();

        $sanidad = Sanidad::join('alumnos', 'sanidad.alumno', '=', 'alumnos.id')
            ->where("sanidad.id", "=", \request('cita'))
            ->update([
                "alumnos.excusado" => \request('excusado'),
                "sanidad.fecha_incapacidad" => \request('fecha_incapacidad'),
                "sanidad.observaciones_incapacidad" => \request('observaciones_incapacidad'),
                "sanidad.lugar_incapacidad" => \request('lugar_incapacidad'),
                "sanidad.motivo_incapacidad" => \request('motivo_incapacidad'),
                "sanidad.asistencia" => true,
            ]);

        return redirect()->action('SanidadController@index', ['success' => true]);

    }
}
