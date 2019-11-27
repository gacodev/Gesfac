@extends('layouts.layouts')

@section('title')
    <title>REGISTRAR ALUMNO</title>
@endsection

@section('page_content')
    <h2 class="title_page">REGISTRAR ALUMNO</h2>

    {!! Form::open(['url' => 'registrar_alumno']) !!}


    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("tipo_documento", "Tipo documento", ['class' => 'control-label']) }}
            {{Form::select('tipo_documento', $tipo_documentos, null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("numero_documento", "Número", ['class' => 'control-label']) }}
            {{ Form::text("numero_documento", null, array_merge(['class' => 'form-control', 'required',], [])) }}
        </div>

    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("nombre", "Nombre", ['class' => 'control-label']) }}
            {{ Form::text("nombre", null, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("telefono", "Teléfono", ['class' => 'control-label']) }}
            {{ Form::text("telefono", null, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>
    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("direccion", "Dirección", ['class' => 'control-label']) }}
            {{ Form::text("direccion", null, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("correo", "Correo", ['class' => 'control-label']) }}
            {{ Form::email("correo", null, array_merge(['class' => 'form-control', 'required'], [])) }}
        </div>
    </div>

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{Form::select('escuadron', $escuadrones, null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

    </div>

    <div class="row">
        <div class="form-group col-12 col-lg-6 custom-form-group">
            {{ Form::checkbox("madre", "madre", false, array_merge(['class' => 'big-checkbox', 'id' => 'madre'], [])) }}
            {{ Form::label("madre", "Agregar información de la Madre", ['class' => 'control-label']) }}
        </div>

        <div class="form-group col-12 col-lg-6 custom-form-group">
            {{ Form::checkbox("padre", "value", false, array_merge(['class' => 'big-checkbox', 'id' => 'padre'], [])) }}
            {{ Form::label("padre", "Agregar información del Padre", ['class' => 'control-label']) }}
        </div>
    </div>

    <div id="mother_registration" class="hidden">

        <h2 class="title_page">REGISTRAR MADRE DE ALUMNO</h2>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("tipo_documento_madre", "Tipo documento", ['class' => 'control-label']) }}
                {{Form::select('tipo_documento_madre', $tipo_documentos, null, array('class'=>'form-control madre', 'placeholder'=>'Seleccionar ...'))}}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("numero_documento_madre", "Número", ['class' => 'control-label']) }}
                {{ Form::text("numero_documento_madre", null, array_merge(['class' => 'form-control madre',], [])) }}
            </div>

        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("nombre_madre", "Nombre", ['class' => 'control-label']) }}
                {{ Form::text("nombre_madre", null, array_merge(['class' => 'form-control madre'], [])) }}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("telefono_madre", "Teléfono", ['class' => 'control-label']) }}
                {{ Form::text("telefono_madre", null, array_merge(['class' => 'form-control madre'], [])) }}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("direccion_madre", "Dirección", ['class' => 'control-label']) }}
                {{ Form::text("direccion_madre", null, array_merge(['class' => 'form-control madre'], [])) }}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("correo_madre", "Correo", ['class' => 'control-label']) }}
                {{ Form::email("correo_madre", null, array_merge(['class' => 'form-control madre'], [])) }}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("ocupacion_madre", "Ocupación", ['class' => 'control-label']) }}
                {{ Form::text("ocupacion_madre", null, array_merge(['class' => 'form-control madre'], [])) }}
            </div>

        </div>
    </div>

    <div id="father_registration" class="hidden">

        <h2 class="title_page">REGISTRAR PADRE DE ALUMNO</h2>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("tipo_documento_padre", "Tipo documento", ['class' => 'control-label']) }}
                {{Form::select('tipo_documento_padre', $tipo_documentos, null, array('class'=>'form-control padre', 'placeholder'=>'Seleccionar ...'))}}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("numero_documento_padre", "Número", ['class' => 'control-label']) }}
                {{ Form::text("numero_documento_padre", null, array_merge(['class' => 'form-control padre',], [])) }}
            </div>

        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("nombre_padre", "Nombre", ['class' => 'control-label']) }}
                {{ Form::text("nombre_padre", null, array_merge(['class' => 'form-control padre'], [])) }}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("telefono_padre", "Teléfono", ['class' => 'control-label']) }}
                {{ Form::text("telefono_padre", null, array_merge(['class' => 'form-control padre'], [])) }}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("direccion_padre", "Dirección", ['class' => 'control-label']) }}
                {{ Form::text("direccion_padre", null, array_merge(['class' => 'form-control padre'], [])) }}
            </div>

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("correo_padre", "Correo", ['class' => 'control-label']) }}
                {{ Form::email("correo_padre", null, array_merge(['class' => 'form-control padre'], [])) }}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-12 col-lg-6">
                {{ Form::label("ocupacion_padre", "Ocupación", ['class' => 'control-label']) }}
                {{ Form::text("ocupacion_padre", null, array_merge(['class' => 'form-control padre'], [])) }}
            </div>

        </div>
    </div>

    {{--    <div class="row">--}}

    {{--        <div class="form-group col-12 form-header">--}}
    {{--            {{ Form::checkbox("madre", null, false, array_merge(['class' => 'form-control'], [])) }}--}}
    {{--            <h1 class="text-center">MADRE</h1>--}}
    {{--        </div>--}}



    {{--        <div class="form-group col-12 col-lg-6">--}}
    {{--            {{ Form::label("tipo_documento_madre", "Tipo documento", ['class' => 'control-label']) }}--}}
    {{--            {{Form::select('tipo_documento_madre', $tipo_documentos, null, array('class'=>'form-control', 'required', "disabled", 'placeholder'=>'Seleccionar ...'))}}--}}
    {{--        </div>--}}

    {{--    </div>--}}

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


    {{--        <!-- Button -->--}}
    {{--        <div class="form-group col-12 col-md-6">--}}
    {{--            <label class="control-label" for="singlebutton"></label>--}}
    {{--            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>--}}
    {{--        </div>--}}


    {{--        <div class="row">--}}
    {{--            <div class="form-group col-12 col-md-6">--}}
    {{--                <label for="excel" class="subir">--}}
    {{--                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel--}}
    {{--                </label>--}}
    {{--                <input type="file" id="excel" onchange='cambiar()'  style='display: none;'/>--}}
    {{--                <div id="info"></div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    @if(isset($success)&& $success)
        <div class="form-group col-12 col-md-12">
            <div class="alert alert-success" role="alert">
                Se registro el alumno satisfactoriamente
            </div>
        </div>
    @endif

    @if(isset($success)&& !$success)
        <div class="form-group col-12 col-md-12">
            <div class="alert alert-danger" role="alert">
                Ocurrio un error
            </div>
        </div>
    @endif

    <script>
        var registrar_madre = document.getElementById("mother_registration");
        var registrar_padre = document.getElementById("father_registration");
        var madre = document.getElementById("madre");
        var padre = document.getElementById("padre");

        madre.addEventListener('click', function() {

            if (this.checked) {
                estado = 1
                add_and_remove_required("madre", true);
                registrar_madre.classList.remove("hidden");
            } else {
                estado = 0
                add_and_remove_required("madre", false);
                registrar_madre.classList.add("hidden");
            }

        })

        padre.addEventListener('click', function() {

            if (this.checked) {
                estado = 1
                add_and_remove_required("padre", true);
                registrar_padre.classList.remove("hidden");

            } else {
                estado = 0
                registrar_padre.classList.add("hidden");
                add_and_remove_required("padre", false);
            }

        })

        function add_and_remove_required(option, value) {

            var  elementos = document.querySelectorAll("."+option);

            for (var i = 0; i < elementos.length; i++) {

                elementos[i].required = value
            }
        }

    </script>

@endsection
