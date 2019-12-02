<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\AlumnoArmerillo;
use App\AlumnoVisitantes;
use App\Familiar;
use App\novedad;
use App\Sanidad;
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
        $alumnos = Alumno::where('escuadron', '=', request('escuadron'))
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
        $tipo_documentos = TipoDocumento::pluck('tipo', 'id');
        $escudrones = Escuadron::pluck('escuadron', 'id');

//        dd(request());

        return view('registrar_alumno')
            ->with("tipo_documentos",$tipo_documentos)
            ->with("escuadrones", $escudrones)
            ->with("success", request("success"));
    }

    public function crear_alumno()
    {

        request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:alumnos',
            'escuadron' => 'required',
        ]);

        $alumno = NULL;
        $request_madre = \request("madre");
        $request_padre = \request("padre");

        if($request_madre){
            request()->validate([
                'nombre_madre' => 'required',
                'telefono_madre' => 'required',
                'direccion_madre' => 'required',
                'correo_madre' => 'required|email',
                'tipo_documento_madre' => 'required',
                'numero_documento_madre' => 'required',
                'ocupacion_madre' => 'required',
            ]);
        }

        if($request_padre){
            request()->validate([
                'nombre_padre' => 'required',
                'telefono_padre' => 'required',
                'direccion_padre' => 'required',
                'correo_padre' => 'required|email',
                'tipo_documento_padre' => 'required',
                'numero_documento_padre' => 'required',
                'ocupacion_padre' => 'required',
            ]);
        }

        DB::beginTransaction();

        try {
            $alumno = Alumno::create([
                "nombre" => request("nombre"),
                "telefono" => request("telefono"),
                "direccion" => request("direccion"),
                "correo" => request("correo"),
                "tipo_documento" => request("tipo_documento"),
                "numero_documento" => request("numero_documento"),
                "escuadron" => request("escuadron"),
            ]);

            if($request_madre) {
                $madre = Familiar::create([
                    "alumno" => $alumno ->id,
                    "nombre" => request("nombre_madre"),
                    "telefono" => request("telefono_madre"),
                    "direccion" => request("direccion_madre"),
                    "correo" => request("correo_madre"),
                    "tipo_documento" => request("tipo_documento_madre"),
                    "tipo_familiar" => 2,
                    "numero_documento" => request("numero_documento_madre"),
                    "ocupacion" => request("ocupacion_madre"),
                ]);
            }

            if($request_padre) {
                $padre = Familiar::create([
                    "alumno" => $alumno ->id,
                    "nombre" => request("nombre_padre"),
                    "telefono" => request("telefono_padre"),
                    "direccion" => request("direccion_padre"),
                    "correo" => request("correo_padre"),
                    "tipo_documento" => request("tipo_documento_padre"),
                    "tipo_familiar" => 1,
                    "numero_documento" => request("numero_documento_padre"),
                    "ocupacion" => request("ocupacion_padre"),
                ]);
            }

            $sanidad = Sanidad::create([
                "alumno" => $alumno ->id
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $alumno = null;
        }

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
        $alumno =Alumno::all();
        return view('registro_arm')
            ->with('armerillo',$armerillo)
            ->with('alumno' ,$alumno)
            ->with('visitante' ,$visitante);
    }

    public  function asignar_arm(visitante $visitante){

        $alumno = Alumno::leftJoin('alumno_armerillo', 'alumno_armerillo.alumno', '=', 'alumnos.id')
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

        $listar = Alumno::leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
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

    public function actualizar_novedad(){

        $id = \request("id");
        $novedad = \request("value");

        $novedad = Alumno::where("id" , "=", $id)
            ->update([
                "novedad" => $novedad
            ]);

        return "success";
    }

    public function contar_novedades(){

        $novedades = novedad::pluck('id', 'novedad');
        $escuadrones = Escuadron::pluck('escuadron');

        foreach ($novedades as $key => $novedad)
            $novedades[$key] = 0;

        $novedades_escuadrones = [];

        foreach ($escuadrones as $escuadron){
            $novedades_escuadrones[$escuadron] = clone $novedades;

            $filtrar_novedades = Alumno::leftJoin('escuadrones', 'escuadrones.id', '=', 'alumnos.escuadron')
                ->leftJoin('novedades', 'novedades.id', '=', 'alumnos.novedad')
                ->where('escuadrones.escuadron', '=', $escuadron);

            foreach ($filtrar_novedades->get(["novedades.novedad AS novedad"]) as $index)
                $novedades_escuadrones[$escuadron][$index->novedad] +=1;

            $novedades_escuadrones[$escuadron]["total"]=$filtrar_novedades->count();

        }

        return $novedades_escuadrones;
    }

    public function actualizar_excusa(){

        $id = \request("id");
        $excusa = \request("value");

        $excusa = Alumno::where("id" , "=", $id)
            ->update([
                "excusado" => $excusa
            ]);

        return "success";
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
