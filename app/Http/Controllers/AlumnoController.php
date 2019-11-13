<?php

namespace App\Http\Controllers;

use App\alumno;
use App\AlumnoArmerillo;
use App\AlumnoVisitantes;
use App\novedad;
use App\visitante;
use App\armerillo;
use App\TipoDocumento;
use App\Escuadron;
//use PDF;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{

    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas

        AlumnoVisitantes::truncate();
        visitante::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        return redirect()->action('AlumnoController@ingreso');
    }

    public function show(alumno $alumno)
    {
        $armas = armerillo::leftJoin('alumno_armerillo', 'alumno_armerillo.fusil', '=', 'armerillo.id')
            ->leftJoin('alumnos', 'alumnos.id', '=', 'alumno_armerillo.alumno')
            ->leftJoin('tipo_fusil', 'tipo_fusil.id', '=', 'armerillo.tipo_fusil')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->get([
                "alumnos.nombre AS alumno",
                "armerillo.fusil AS fusil_serial",
                "armerillo.id AS fusil",
                "armerillo.estado AS estado",
                "tipo_fusil.tipo AS tipo_fusil",
                "escuadrones.escuadron AS escuadron",
            ]);

        return view('armas')->with('armas', $armas);
    }

    public function show_per_squadron()
    {
        $alumnos = alumno::where('escuadron', '=', request('escuadron'))
            ->orderBy('nombre', 'asc')
            ->get();

        return $alumnos;
    }

    public function reportes()
    {
        return view('reportes');
    }
    public function registrar_alumno()
    {
        $tipo_documentos = TipoDocumento::get();
        $escudrones = Escuadron::get();

//        dd(request());

        return view('registrar_alumno')
            ->with("tipo_documentos",$tipo_documentos)
            ->with("escuadrones", $escudrones)
            ->with("success", request("success"));
    }

    public function crear_alumno()
    {
        $alumno = new alumno;

        $alumno->nombre = request("nombre");
        $alumno->telefono = request("telefono");
        $alumno->direccion = request("direccion");
        $alumno->correo = request("correo");
        $alumno->tipo_documento = request("tipo_documento");
        $alumno->numero_documento = request("numero_documento");
        $alumno->escuadron = request("escuadron");
        $alumno->save();
        if ($alumno) {
            return redirect()->action('AlumnoController@registrar_alumno', ['success' => true]);
        }

        return redirect()->action('AlumnoController@registrar_alumno', ['success' => false]);
    }

    public function ingreso(visitante $visitante)
    {

        $visitante = visitante::join('alumno_visitantes', 'alumno_visitantes.visitante', '=', 'visitantes.id')
            ->join('alumnos', 'alumnos.id', '=', 'alumno_visitantes.alumno')
            ->get([
                'alumnos.nombre AS alumno',
                'visitantes.nombre AS visitante',
                'visitantes.numero_documento AS visitante_numero_documento',
                'visitantes.telefono AS visitante_telefono',
            ]);

        return view('ingreso')->with('visitante',$visitante);
    }


    public function asignacion(visitante $visitante)
    {

        $visitante = visitante::
            join('alumnos', 'alumnos.id', '=', 'alumno_armerillo.alumno')
            ->join('armerillo', 'armerillo.fusil', '=', 'alumno_armerillo.fusil')
            ->get([
                'alumnos_armerilo.nombre AS alumno',
                'armerillo_armerillo.fusil AS fusil'
            ]);

        return view('/')->with('visitante',$visitante);
    }


    public function update(Request $request)
    {
        $armerillo = armerillo::find($request["id"]);
        $armerillo->estado = $request["estado"];
        $armerillo->save();

        return "success";
    }

    public function total_weapons(Request $request){

        $norinco = armerillo::where('tipo_fusil', '=', 1)
            ->where('estado', '=', 1)
            ->count();

        $m16 = armerillo::where('tipo_fusil', '=', 2)
            ->where('estado', '=', 1)
            ->count();

        $galil = armerillo::where('tipo_fusil', '=', 3)
            ->where('estado', '=', 1)
            ->count();

        $total_weapons = [
            "norinco"=>$norinco,
            "m16"=>$m16,
            "galil"=>$galil
        ];

        return $total_weapons;

    }

    public function arm(alumno $alumno){
        $visitante = visitante::get();
        $armerillo = armerillo::all();
        $alumno =alumno::all();
        return view('registro_arm')
            ->with('armerillo',$armerillo)
            ->with('alumno' ,$alumno)
            ->with('visitante' ,$visitante);
    }

    public  function asignar_arm(visitante $visitante){

        $alumno = alumno::leftJoin('alumno_armerillo', 'alumno_armerillo.alumno', '=', 'alumnos.id')
            ->leftJoin('armerillo', 'armerillo.id', '=', 'alumno_armerillo.fusil')
            ->leftJoin('tipo_fusil', 'tipo_fusil.id', '=', 'armerillo.tipo_fusil')
            ->leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->get([
                "armerillo.*",
                "alumnos.*",
                "escuadrones.*",
                "alumnos.id AS id",
            ]);

        return view('asignar_arm')
            ->with('alumnos' ,$alumno)
            ->with("success", request("success"));
    }

    public function listar(){

        $novedades = novedad::pluck('novedad', 'id');

        $listar = alumno::leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
            ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
            ->get([
            "alumnos.id AS id",
            "alumnos.nombre AS alumno",
            "escuadrones.escuadron AS escuadron",
            "alumnos.excusado AS excusado",
            "novedades.id AS novedad",
        ]);

        return view('listar')->with('listar', $listar)
            ->with('novedades', $novedades);;
    }



    public function asignar_fusil()
    {
        $input_alumno = explode(':', request("referencia"))[0];
        $input_fusil = explode(':', request("referencia"))[1];
        $asociar__nueva_arma = request("fusil");


        $armerillo = armerillo::where("id", "=", $asociar__nueva_arma)
            ->where("asignado", "=", 0);

        if($input_alumno && $input_fusil && $asociar__nueva_arma){

            $alumno_armerillo = AlumnoArmerillo::leftJoin('armerillo', 'alumno_armerillo.fusil', '=', 'armerillo.id')
                ->where("alumno_armerillo.estado", "=", 1)
                ->where("alumno_armerillo.alumno", "=", $input_alumno)
                ->where("armerillo.fusil", "=", $input_fusil);

            #comprueba la asociacion de entrada y la nueva arma a asociar (asociacion = 0)
            if($alumno_armerillo->count() && $armerillo->count()){

                #hacer rollback si, se genera una exepcion
                DB::transaction(function () use ($alumno_armerillo, $input_alumno, $asociar__nueva_arma, $armerillo) {

                    $alumno_armerillo->update([
                        "armerillo.asignado"=>0,
                        "armerillo.estado"=>1,
                    ]);

                    $alumno_armerillo->delete();

                    $nuevo_alumno_armerillo = new AlumnoArmerillo;

                    $nuevo_alumno_armerillo->alumno = $input_alumno;
                    $nuevo_alumno_armerillo->fusil = $asociar__nueva_arma;
                    $nuevo_alumno_armerillo->estado = 1;
                    $nuevo_alumno_armerillo->save();

                    $armerillo->update([
                        "asignado"=>1
                    ]);
                });

                return redirect()->action('AlumnoController@asignar_arm', ['success' => true]);
            }
        }

        else if($input_alumno && !$input_fusil && $asociar__nueva_arma){

            $alumno_armerillo = AlumnoArmerillo::leftJoin('armerillo', 'alumno_armerillo.fusil', '=', 'armerillo.id')
                ->where("alumno_armerillo.estado", "=", 1)
                ->where("alumno_armerillo.alumno", "=", $input_alumno);

            #comprueba que no halla asociacion de entrada y la nueva arma a asociar (asociacion = 0)
            if(!$alumno_armerillo->count() && $armerillo->count() ){

                #hacer rollback si, se genera una exepcion
                DB::transaction(function () use ($input_alumno, $asociar__nueva_arma, $armerillo) {

                    $nuevo_alumno_armerillo = new AlumnoArmerillo;

                    $nuevo_alumno_armerillo->alumno = $input_alumno;
                    $nuevo_alumno_armerillo->fusil = $asociar__nueva_arma;
                    $nuevo_alumno_armerillo->estado = 1;
                    $nuevo_alumno_armerillo->save();

                    $armerillo->update([
                        "asignado"=>1
                    ]);
                });

                return redirect()->action('AlumnoController@asignar_arm', ['success' => true]);

            }

        }

        return redirect()->action('AlumnoController@asignar_arm', ['success' => false]);

    }

    public function desvincular_fusil()
    {
        $input_alumno = explode(':', request("referencia"))[0];
        $input_fusil = explode(':', request("referencia"))[1];

        if($input_alumno && $input_fusil){

            $alumno_armerillo = AlumnoArmerillo::leftJoin('armerillo', 'alumno_armerillo.fusil', '=', 'armerillo.id')
                ->where("alumno_armerillo.estado", "=", 1)
                ->where("alumno_armerillo.alumno", "=", $input_alumno)
                ->where("armerillo.fusil", "=", $input_fusil);

            #comprueba la asociacion de entrada y la nueva arma a asociar (asociacion = 0)
            if($alumno_armerillo->count()){

                #hacer rollback si, se genera una exepcion
                DB::transaction(function () use ($alumno_armerillo, $input_alumno) {

                    $alumno_armerillo->update([
                        "armerillo.asignado"=>0,
                        "armerillo.estado"=>1,
                    ]);

                    $alumno_armerillo->delete();
                });

                return "success";
            }
        }

        return "error";
    }
}
