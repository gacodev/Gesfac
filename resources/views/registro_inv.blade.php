
@extends('layouts.layouts')
@section('title')
    <title>INVITADOS</title>
@endsection

@section('page_content')

    <h2 class="title_page">REGISTRAR VISITANTES</h2>

    {!! Form::open(['url' => 'registrar_visitante']) !!}

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
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{Form::select('escuadron', $escuadrones, null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("alumno", "Alumno", ['class' => 'control-label']) }}
            {{Form::select('alumno', [], null, array('class'=>'form-control', 'required', 'placeholder'=>'Seleccionar ...'))}}
        </div>

    </div>

    <div class="row">
        <div class="form-group col-12 col-lg-6 load-file">
            {!! Html::decode(Form::label('excel', '<i class="fas fa-cloud-upload-alt fa-2x"></i> Cargar Excel', ['class' => 'subir'])) !!}
            {{ Form::file("excel", array_merge(['class' => 'form-control hidden', 'onchange' => 'cambiar()'], [])) }}
            <div id="info"></div>
        </div>
    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger col-12" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="form-group col-8">
            {{ Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}
        </div>
    </div>

    {!! Form::close() !!}

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
                no   Se registro el visitante satisfactoriamente
            </div>
        </div>
    @endif


    {{--    </form>--}}
    {{--    <div class="row">--}}
    {{--        <div class="form-group col-12 col-md-6">--}}
    {{--            <form action="{{route('visitante')}}" method="post" enctype="multipart/form-data">--}}
    {{--                @csrf--}}
    {{--                <label for="excel">--}}
    {{--                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel--}}
    {{--                </label>--}}
    {{--                <input  class="m-auto" type="file" name="excel" id="excel"   style='display: none;'/>--}}
    {{--                <button class="btn btn-dark card-body"><b>IMPORTAR INVITADOS COMANDO</b></button>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}

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
