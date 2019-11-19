@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">REGISTRO AGENDAR DE CITAS</h2>

    {!! Form::open(['url' => 'post_registro_agendar_cita']) !!}

    {{ Form::hidden('cita', $cita->cita) }}


    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{ Form::text("escuadron", $cita->escuadron, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("alumno", "Alumno", ['class' => 'control-label']) }}
            {{ Form::text("alumno", $cita->alumno, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("tipo_cita", "Tipo_cita", ['class' => 'control-label']) }}
            {{ Form::text("tipo_cita", $cita->tipo_cita, array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_solicitud", "Fecha de solicitud", ['class' => 'control-label']) }}
            {{ Form::date("fecha_solicitud", \Carbon\Carbon::parse($cita->fecha_solicitud), array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}
        </div>
    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_asignacion", "Fecha de asignación", ['class' => 'control-label']) }}
            {{ Form::date("fecha_asignacion", null, array_merge(['class' => 'form-control', 'required'], [])) }}

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

    <script>

    </script>


@endsection
