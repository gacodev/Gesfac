@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">REGISTRO SOLICITUD DE CITAS</h2>

    {!! Form::open(['url' => 'registrar_cita']) !!}


    <div class="row">
        <div class="form-group col-12 col-lg-6">
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{Form::select('escuadron', $escuadrones, null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("alumno", "Alumno", ['class' => 'control-label']) }}
            {{Form::select('alumno', [], null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12 col-lg-6">
            {{ Form::label("tipo_cita", "Tipo cita", ['class' => 'control-label']) }}
            {{Form::select('tipo_cita', $tipo_cita, null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("fecha_solicitud", "Fecha de solicitud", ['class' => 'control-label']) }}
            {{ Form::date("fecha_solicitud", \Carbon\Carbon::parse($fecha_solicitud), array_merge(['class' => 'form-control', 'required', 'disabled'], [])) }}

        </div>
    </div>

    <div class="row">
        <div class="form-group col-12 col-lg-6">
            {{ Form::label("motivo", "Motivo", ['class' => 'control-label']) }}
            {{ Form::text("motivo", null, array_merge(['class' => 'form-control', 'required'], [])) }}

        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("descripcion", "Descripción", ['class' => 'control-label']) }}
            {{ Form::text("descripcion", null, array_merge(['class' => 'form-control'], [])) }}

        </div>
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger col-8" role="alert">
            Todos los campos son obligatorios
        </div>
    @endif

    <div class="form-group col-8">
        {{ Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}

    </div>

    {!! Form::close() !!}

    <script>
        var escuadron = document.getElementById("escuadron")

        escuadron.addEventListener('change', function() {

            axios.post('/alumnos_por_escuadron', {
                escuadron: escuadron.value
            })
                .then(function(response) {

                    var alumnos = document.getElementById("alumno")

                    alumnos.innerHTML =`<option value="">Seleccionar ...</option>`
                    response.data.forEach(agregar_alumnos)

                })
                .catch(function(error) {
                    console.log(error);
                });
        })

        function agregar_alumnos(item,index) {
            document.getElementById("alumno").innerHTML+=`<option value="${item.id}">${item.nombre}</option>`
        }
    </script>


@endsection
