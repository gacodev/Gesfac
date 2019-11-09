@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">ATENCION DE CITAS</h2>

    @include("partials.success_message")

    <div class="row table table-responsive">
        <table class="table thead-brand bordered  text-center" id="mitabla">
            <thead>
            <tr>
                <th>CITA</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>TIPO CITA</th>
                <th>FECHA DE SOLICITUD</th>
                <th>FECHA DE ASIGNACION</th>
                <th>ATENDIDO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>{{$cita->cita}}</td>
                    <td>{{$cita->nombre}}</td>
                    <td>{{$cita->telefono}}</td>
                    <td>{{$cita->tipo_cita}}</td>
                    <td>{{$cita->fecha_solicitud}}</td>
                    <td>{{$cita->fecha_asignacion}}</td>
                    <td>
                        <div class="container">
                            <div class="round">
                                <input type="checkbox" class="atender" id="{{$cita->cita}}" {{$cita->asistencia?"checked":null}}/>
                                <label for="{{$cita->cita}}"></label>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        var armas = document.querySelectorAll(".atender");

        for (var i = 0; i < armas.length; i++) {

            var alumno = armas[i]

            alumno.addEventListener('change', function() {

                if (this.checked) {
                    estado = 1
                } else {
                    estado = 0
                }

                window.location.href = "/atendido/"+this.id;

            })
        }
    </script>

@endsection
