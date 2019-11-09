@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">REGISTRAR ATENCION DE CITAS</h2>

    <form class="form-horizontal" method="post" action="/registrar_atencion_citas">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <input name="cita" type="hidden" class="form-control input-md" value="{{$sanidad->cita}}">
                <label for="cita_disabled">Cita</label>
                <input id="cita_disabled" name="cita_disabled" type="text" class="form-control input-md" value="{{$sanidad->cita}}" disabled required>
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="numero_documento">Numero Documento</label>
                <input id="numero_documento" name="numero_documento" type="text" class="form-control input-md" value="{{$sanidad->numero_documento}}" disabled required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="escuadron">Escuadron</label>
                <input id="escuadron" name="escuadron" type="text" class="form-control input-md" value="{{$sanidad->escuadron}}" disabled required>
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="alumno">Alumno</label>
                <input id="alumno" name="alumno" type="text" class="form-control input-md" value="{{$sanidad->nombre}}" disabled required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="telefono">Telefono</label>
                <input id="telefono" name="telefono" type="text" class="form-control input-md" value="{{$sanidad->telefono}}" disabled required>
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="correo">Correo</label>
                <input id="correo" name="correo" type="text" class="form-control input-md" value="{{$sanidad->correo}}" disabled required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="fecha_solicitud">Fecha_solicitud</label>
                <input id="fecha_solicitud" name="fecha_solicitud" type="date" class="form-control input-md" value="{{$sanidad->fecha_solicitud}}" disabled required>
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="fecha_asiganacion">Fecha Asiganción</label>
                <input id="fecha_asiganacion" name="fecha_asiganacion" type="date" class="form-control input-md" value="{{$sanidad->fecha_asignacion}}" disabled required>
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-md-6">
                <label for="excusado">Excusado</label>
                <select id="excusado" name="excusado" required class="form-control">
                    <option value="0" >Sin Excusa</option>
                    <option value="1" >Con Excusa</option>

                </select>
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="fecha_incapacidad">Fecha final de incapacidad</label>
                <input id="fecha_incapacidad" name="fecha_incapacidad" type="date" required min="{{$fecha_minima}}" max="{{$fecha_maxima}}" class="form-control input-md" >
            </div>

        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="lugar">Lugar incapacidad</label>
                <input id="lugar" name="lugar" type="text" required class="form-control input-md">
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="motivo">Motivo incapacidad</label>
                <input id="motivo" name="motivo" type="text" required class="form-control input-md">
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-md-6">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" required class="form-control"></textarea>
            </div>
            <!-- Text input-->

        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="singlebutton"></label>
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
            </div>
        </div>


    </form>

@endsection
