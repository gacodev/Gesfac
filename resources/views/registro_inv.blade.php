
@extends('layouts.layouts')
@section('title')
    <title>INVITADOS</title>
@endsection

@section('page_content')

    <h2 class="title_page">REGISTRAR VISITANTES</h2>

    <form class="form-horizontal" method="post" action="/registrar_visitante">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="tipo_documento">Documento</label>
                <select id="tipo_documento" name="tipo_documento" class="form-control">
                    @foreach($tipo_documentos as $tipo_documento)
                        <option value="{{$tipo_documento->id}}">{{$tipo_documento->tipo}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="numero_documento">Numero documento</label>
                <input id="numero_documento" name="numero_documento" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="nombre">Nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="">
            </div>

            <!-- Text input-->
            <div class="form-group col-12 col-md-6">
                <label for="telefono">Telefono</label>
                <input id="telefono" name="telefono" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="escuadron">Escuadron</label>
                <select id="escuadron" name="escuadron" class="form-control">
                    <option value="0"></option>
                    @foreach($escuadrones as $escuadron)
                        <option value="{{$escuadron->id}}">{{$escuadron->escuadron}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="alumnos">Alumno</label>
                <select id="alumnos" name="alumnos" class="form-control">
                    <option value="0"></option>
                </select>
            </div>


        </div>

        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="singlebutton"></label>
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        @if(isset($success)&& $success)
            <div class="form-group col-12 col-md-12">
                <div class="alert alert-success" role="alert">
                    Se registro el visitante satisfactoriamente
                </div>
            </div>
        @endif

        @if(isset($success)&& !$success)
            <div class="form-group col-12 col-md-12">
                <div class="alert alert-danger" role="alert">
                    Se registro el visitante satisfactoriamente
                </div>
            </div>
        @endif

    </form>
    <div class="row">
        <div class="form-group col-12 col-md-6">
            <form action="{{route('visitante')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="excel">
                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel
                </label>
                <input  class="m-auto" type="file" name="excel" id="excel"   style='display: none;'/>
                <button class="btn btn-dark card-body"><b>IMPORTAR INVITADOS COMANDO</b></button>
            </form>
        </div>
    </div>

    <script>
        var escuadron = document.getElementById("escuadron")

        escuadron.addEventListener('change', function() {

            axios.post('/alumnos_por_escuadron', {
                escuadron: escuadron.value
            })
                .then(function(response) {

                    var alumnos = document.getElementById("alumnos")

                    alumnos.innerHTML =`<option value="0"></option>`
                    response.data.forEach(agregar_alumnos)

                })
                .catch(function(error) {
                    console.log(error);
                });
        })

        function agregar_alumnos(item,index) {
            document.getElementById("alumnos").innerHTML+=`<option value="${item.id}">${item.nombre}</option>`
        }
    </script>
@endsection
