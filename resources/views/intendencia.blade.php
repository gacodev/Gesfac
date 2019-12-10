
@extends('layouts.layouts')
@section('title')
    <title>INTENDENCIA</title>
@endsection

@section('page_content')

    <h1 class="title_page"><b>ENTREGA DE INTENDENCIA</b></h1>

    {!! Form::open(array('route' => 'intendencia', 'method' => 'get', 'id'=> 'form')) !!}

    <div class="row">

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("escuadron", "Escuadron", ['class' => 'control-label']) }}
            {{Form::select('escuadron', $escuadrones, $request->escuadron, array('onChange'=>'form_submit("escuadron")', 'class'=>'form-control', 'placeholder'=>'Seleccionar ...'))}}
        </div>

        <div class="form-group col-12 col-lg-6">
            {{ Form::label("alumno", "Alumno", ['class' => 'control-label']) }}
            {{Form::select('alumno', $alumnos, $request->alumno, array('onChange'=>'form_submit("alumno")', 'class'=>'form-control', 'placeholder'=>'Seleccionar ...'))}}
        </div>

    </div>

    {!! Form::close() !!}

    <div class="table-container" id="table-container">


        <div class="table-container">
            <table class="table thead-brand bordered  text-center" id="mitabla">
                <thead>
                <tr>
                    <th>ARTICULO</th>
                    <th>CANTIDAD</th>
                    <th>DESCRIPCION</th>
                    <th>GUARDADO</th>
                    <th>ESTADO</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articulos as $articulo)
                    <tr>
                        <td class="align-middle articulo">{{$articulo->articulo}}</td>
                        <td class="align-middle" style="max-width: 2rem">
                            {{ Form::number(null, $articulo->cantidad, array_merge(['class' => 'form-control article text-center', 'id'=> "quantity:".$request->alumno.":".$articulo->id], [])) }}
                        </td>
                        <td class="align-middle">
                            {{ Form::text(null, $articulo->descripcion, array_merge(['class' => 'form-control article', 'id' => "description:".$request->alumno.":".$articulo->id], [])) }}
                        </td>
                        <td class="align-middle" id="{{"save:".$request->alumno.":".$articulo->id}}">
                            @if($articulo->intendencia)
                                <i class="fas fa-check" style="color: green"></i>
                            @else
                                <i class="fas fa-times" style="color: red"></i>
                            @endif
                        </td>
                        <td class="align-middle" id="{{"state:".$request->alumno.":".$articulo->id}}">
                            @if($articulo->intendencia)
                                <i class="fas fa-check" style="color: green"></i>
                            @else
                                <i class="fas fa-exclamation" style="color: hsl(60,70%,50%)"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script>

        var formulario = document.getElementById("form");
        var escuadron = document.getElementById("escuadron");
        var alumno = document.getElementById("alumno");

        function form_submit(option) {

            if(option==="escuadron") alumno.value = null

            formulario.submit()
        }

    </script>

    @if($request->alumno)

        <script>

            function icon_state(id){
                var state = id.split(":").splice(1);
                state.unshift("state");
                state = state.join(":");

                var icon_state_id = document.getElementById(state);

                icon_state_id.innerHTML = `<i class="fas fa-check" style="color: green"></i>`;

            }

            function icon_save(id, option = true){
                var save = id.split(":").splice(1);
                save.unshift("save");
                save = save.join(":");

                var icon_save_id = document.getElementById(save);

                if(option) icon_save_id.innerHTML = `<i class="fas fa-check" style="color: green"></i>`;
                else icon_save_id.innerHTML = `<i class="fas fa-times" style="color: red"></i>`;

            }

            function guardar_cambios(id, value, url) {

                axios.post(url, {
                    id: id,
                    value
                })
                    .then(function(response) {
                        // console.log(response)
                        icon_state(id)
                        icon_save(id)
                    })
                    .catch(function(error) {
                        console.log(error)
                    });
            }


            var articulos = document.querySelectorAll(".article");

            for (var i = 0; i < articulos.length; i++) {

                var articulo = articulos[i];

                articulo.addEventListener('change', function() {
                    guardar_cambios(this.id, this.value, "/post_intendencia_articulo")
                })

                articulo.addEventListener('keydown', function(e) {
                    if(e.key!=="Tab") icon_save(this.id, false)
                })
            }

        </script>

    @endif

@endsection
