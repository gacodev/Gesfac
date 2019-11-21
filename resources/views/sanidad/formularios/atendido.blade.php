@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">REGISTRAR ATENCION DE CITAS</h2>

    {!! Form::open(['url' => 'registrar_atencion_citas']) !!}

    {{ Form::hidden('cita', $sanidad->cita) }}
    {{ Form::hidden('fecha_asignacion', $sanidad->fecha_asignacion) }}


    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("cita_disable", "Cita", ['class' => 'control-label']) }}
            {{ Form::text("cita_disable", $sanidad->cita, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("numero_documento", "Número documento", ['class' => 'control-label']) }}
            {{ Form::text("numero_documento", $sanidad->numero_documento, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{ Form::text("escuadron", $sanidad->escuadron, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("alumno", "Alumno", ['class' => 'control-label']) }}
            {{ Form::text("alumno", $sanidad->nombre, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("telefono", "Teléfono", ['class' => 'control-label']) }}
            {{ Form::text("telefono", $sanidad->telefono, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("correo", "Correo", ['class' => 'control-label']) }}
            {{ Form::text("correo", $sanidad->correo, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_solicitud", "Fecha de solicitud", ['class' => 'control-label']) }}
            {{ Form::date("fecha_solicitud", \Carbon\Carbon::parse($sanidad->fecha_solicitud), array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_asignacion", "Fecha de asignación", ['class' => 'control-label']) }}
            {{ Form::date("fecha_asignacion", \Carbon\Carbon::parse($sanidad->fecha_asignacion), array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>
    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_incapacidad", "Fecha de incapacidad", ['class' => 'control-label']) }}
            {{ Form::date("fecha_incapacidad", $sanidad->fecha_incapacidad?\Carbon\Carbon::parse($sanidad->fecha_incapacidad):null, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("excusado", "Excusado", ['class' => 'control-label']) }}
            {{Form::select('excusado', ["0"=>"Sin excusa","1"=>"Excusado"], $sanidad->excusado, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("lugar_incapacidad", "Lugar incapacidad", ['class' => 'control-label']) }}
            {{ Form::text("lugar_incapacidad", $sanidad->lugar_incapacidad, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("motivo_incapacidad", "Motivo incapacidad", ['class' => 'control-label']) }}
            {{ Form::text("motivo_incapacidad", $sanidad->motivo_incapacidad, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("observaciones_incapacidad", "Observaciones incapacidad", ['class' => 'control-label']) }}
            {{ Form::text("observaciones_incapacidad", $sanidad->observaciones_incapacidad, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

    </div>

    @if($errors->any())

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger col-12" role="alert">
                {{ $error }}
            </div>
        @endforeach

    @endif

    <div class="form-group col-8">
        {{ Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}

    </div>

    {!! Form::close() !!}

@endsection
