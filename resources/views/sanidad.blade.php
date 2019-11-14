@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">ATENCION DE CITAS</h2>

    @include("partials.success_message")

    <div class="row table table-responsive">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_agendar" id="total_weapons">
            SOLICITAR
        </button>
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
        function informacion_solicitud_cita(id, estado) {

            axios.post('/informacion_solicitud_cita', {
                id,
                estado
            })
                .then(function(response) {

                    if(response.data){
                        var informacion_solicitud_cita = document.getElementById("alumno_information")

                        var information = `
                                <input type="hidden" value="${response.data.cita}" name="cita"/>
                                <label class="form-control"><b>Alumno: </b> ${response.data.nombre}</label>
                                <label class="form-control"><b>Numero documento: </b> ${response.data.numero_documento}</label>
                                <label class="form-control"><b>Tipo cita: </b>${response.data.tipo_cita}</label>
                                <label class="form-control"><b>Fecha solicitud:  </b>${response.data.fecha_solicitud}</label>
                            `

                        informacion_solicitud_cita.innerHTML = information
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        var armas = document.querySelectorAll(".agendar");

        for (var i = 0; i < armas.length; i++) {

            var alumno = armas[i]

            alumno.addEventListener('change', function() {

                if (this.checked) {
                    estado = 1
                } else {
                    estado = 0
                }

                informacion_solicitud_cita(this.id, estado)
            })
        }

        var escuadron = document.getElementById("agendar_escuadron")

        escuadron.addEventListener('change', function() {

            axios.post('/alumnos_por_escuadron', {
                escuadron: escuadron.value
            })
                .then(function(response) {

                    var alumnos = document.getElementById("agendar_alumno")

                    alumnos.innerHTML =`<option value="0"></option>`
                    response.data.forEach(agregar_alumnos)

                })
                .catch(function(error) {
                    console.log(error);
                });
        })

        function agregar_alumnos(item,index) {
            document.getElementById("agendar_alumno").innerHTML+=`<option value="${item.id}">${item.nombre}</option>`
        }

    </script>

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
