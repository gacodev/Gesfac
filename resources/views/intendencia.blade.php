
@extends('layouts.layouts')
@section('title')
    <title>INTENDENCIA</title>
@endsection

@section('page_content')

    <h1 class="title_page"><b>ENTREGA DE INTENDENCIA</b></h1>

    {!! Form::open(['url' => 'registrar_visitante']) !!}

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

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger col-12" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="table-container" id="table-container">


        <div class="table-container">
            <table class="table thead-brand bordered  text-center" id="mitabla">
                <thead>
                <tr>
                    <th>ARTICULO</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>GUARDAR</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articulos as $articulo)
                    <tr>
                        <td class="align-middle">{{$articulo->articulo}}</td>
                        <td class="align-middle">{{$articulo->descripcion}}<input type="text" class="form-control"></td>
                        <td class="align-middle">{{$articulo->cantidad}}<input type="text" class="form-control"></td>
                        <td>
                            @if(!$articulo->guardar)
                                <a href="{{route('atendido', $articulo->cita)}}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="far fa-save"></i>
                                    </button>
                                </a>
                            @else
                                <a href="{{route('atendido', $articulo->cita)}}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

{{--    <div class="row">--}}
{{--        <div class="form-group col-8">--}}
{{--            {{ Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success btn-sm'] )  }}--}}
{{--        </div>--}}
{{--    </div>--}}

    {!! Form::close() !!}

    <script>
        var escuadron = document.getElementById("escuadron")
        var excel = document.getElementById("excel")
        var load_icon = document.getElementById("load-icon")

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

        excel.addEventListener('change', function() {

            if(excel.value) load_icon.classList.add("color-blue");
            else load_icon.classList.remove("color-blue");

        })
    </script>

@endsection
