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





{{--        <div class="row">--}}

{{--            <hr><h1 class="text-center col-sm-12">MADRE</h1></hr>--}}
{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Documento</label>--}}
{{--                <select id="direccion" name="direccion" type="text" placeholder="" class="form-control" required="">--}}

{{--                    <option value="">1</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Madre</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="correo">telefono</label>--}}
{{--                <input id="correo" name="correo" type="email" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}


{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">ocupacion</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Direccion madre</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="correo">Correo</label>--}}
{{--                <input id="correo" name="correo" type="email" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}


{{--        </div>--}}


{{--        <div class="row">--}}

{{--            <hr><h1 class="text-center col-sm-12">PADRE</h1></hr>--}}
{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Documento</label>--}}
{{--                <select id="direccion" name="direccion" type="text" placeholder="" class="form-control" required="">--}}

{{--                    <option value="">1</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Madre</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="correo">telefono</label>--}}
{{--                <input id="correo" name="correo" type="email" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}


{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">ocupacion</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="direccion">Direccion madre</label>--}}
{{--                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}

{{--            <div class="form-group col-12 col-md-6">--}}
{{--                <label class="control-label" for="correo">Correo</label>--}}
{{--                <input id="correo" name="correo" type="email" placeholder="" class="form-control input-md" required="">--}}
{{--            </div>--}}


{{--        </div>--}}







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

@endsection
