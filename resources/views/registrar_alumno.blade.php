@extends('layouts.layouts')

@section('title')
    <title>REGISTRAR ALUMNO</title>
@endsection

@section('page_content')
    <h2 class="title_page">REGISTRAR ALUMNO</h2>

    <form class="form-horizontal" method="post" action="/registrar_alumno">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="tipo_documento">Documento</label>
                <select id="tipo_documento" name="tipo_documento" class="form-control">
                    @foreach($tipo_documentos as $tipo_documento)
                        <option value="{{$tipo_documento->id}}">{{$tipo_documento->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="numero_documento">Numero</label>
                <input id="numero_documento" name="numero_documento" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="">
            </div>

            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="telefono">Telefono</label>
                <input id="telefono" name="telefono" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="direccion">Direccion</label>
                <input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="">
            </div>

            <div class="form-group col-12 col-md-6">
                <label class="control-label" for="correo">Correo</label>
                <input id="correo" name="correo" type="email" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <!-- Text input-->

        <!-- Select Basic -->
        <div class="form-group col-12 col-md-6">
            <label class="control-label" for="escuadron">Escuadron</label>
            <select id="escuadron" name="escuadron" class="form-control">
                @foreach($escuadrones as $escuadron)
                    <option value="{{$escuadron->id}}">{{$escuadron->escuadron}}</option>
                @endforeach
            </select>
        </div>

        <!-- Button -->
        <div class="form-group col-12 col-md-6">
            <label class="control-label" for="singlebutton"></label>
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
        </div>


        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="excel" class="subir">
                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel
                </label>
                <input type="file" id="excel" onchange='cambiar()'  style='display: none;'/>
                <div id="info"></div>
            </div>
        </div>

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
                    Se registro el alumno satisfactoriamente
                </div>
            </div>
        @endif
    </form>
@endsection
