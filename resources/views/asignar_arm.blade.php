@extends('layouts.layouts')
@extends('layouts.app')
@section('title')
    <title>ASIGNACION DE ARMAMENTO</title>
@endsection
@section('page_content')

    <div id="data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" action="/asignar_fusil">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">ASIGNAR FUSIL</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12 col-md-12" id="container_desvincular_fusil"></div>
                        <div class="form-group col-12 col-md-12">
                            <label for="tipo_documento">Fusil</label>
                            <select name="fusil" id="weaponsAvailable" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="GUARDAR" class="btn btn-success" id="asignar_fusil"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class="title_page">ASIGNAR ARMAMENTO</h2>

    @if(isset($success)&& $success)
        <div class="form-group col-12 col-md-12">
            <div class="alert alert-success" role="alert">
                Los cambios se realizaron con exito
            </div>
        </div>
    @endif

    @if(isset($success)&& !$success)
        <div class="form-group col-12 col-md-12">
            <div class="alert alert-danger" role="alert">
                Ocurrio un error, no se guardaron cambios
            </div>
        </div>
    @endif

    <div class="row table table-responsive">
        <table class="table thead-dark  text-center " id="mitabla">
            <thead>
            <tr>
                <th>ESCUADRON</th>
                <th>ASIGNADO A</th>
                <th>FUSIL</th>
                <th>ASIGNAR</th>
            </tr>
            </thead>
            <tbody>

            @foreach($alumnos as $alumno)
                <td>{{$alumno->escuadron}}</td>
                <td>{{$alumno->nombre}}</td>
                <td>{{$alumno->fusil}}</td>
                <td>
                    <div class="round">
                        <input class="span4 proj-div alumno" data-toggle="modal" data-target="#data"  type="checkbox" id="{{$alumno->id.":".$alumno->fusil}}" {{$alumno->fusil?"checked":null}}/>
                        <label for="{{$alumno->id.":".$alumno->fusil}}"></label>
                    </div>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <script>

        function peticion_desvincular_fusil(referencia) {
            axios.post('/desvincular_fusil',{
                referencia
            })
                .then(function(response) {

                    console.log(response.data)
                    if(response.data=="success") window.location.href = "/asignar_arm?success=1";
                    else window.location.href = "/asignar_arm?success=0";

                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function consultar_armas_disponibles(referencia) {

            var fusil = referencia.split(":")[1]

            var container_desvincular_fusil = document.getElementById("container_desvincular_fusil")

            var input_referencia = `<input type="hidden" value="${referencia}" name="referencia"/>`

            if(fusil){
                input_referencia +=`
            <label for="tipo_documento" class="form-control">Fusil asignado: ${fusil}</label>
            <button type="button" id="desvincular_fusil" class="btn btn-danger">Desvincular Fusil</button>
          `
            }

            container_desvincular_fusil.innerHTML = input_referencia

            var desvincular_fusil = document.getElementById("desvincular_fusil");

            if(desvincular_fusil){

                desvincular_fusil.addEventListener('click', function() {

                    peticion_desvincular_fusil(referencia)

                })
            }

            axios.post('/consultar_armas_disponibles')
                .then(function(response) {

                    document.getElementById("weaponsAvailable").innerHTML=`<option value="0"></option>`

                    response.data.forEach(agregar_fusiles)

                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        var alumnos = document.querySelectorAll(".alumno");

        for (var i = 0; i < alumnos.length; i++) {

            var alumno = alumnos[i]

            alumno.addEventListener('click', function() {
                var estado = null

                if (this.checked) {
                    estado = 1
                } else {
                    estado = 0
                }

                consultar_armas_disponibles(this.id)
            })
        }

        function agregar_fusiles(item,index) {
            document.getElementById("weaponsAvailable").innerHTML+=`<option value="${item.id}">${item.fusil}</option>`
        }

        function asignar_fusil(fusil,option) {
            document.getElementById("weaponsAvailable").innerHTML+=`<option value="${item.id}">${item.fusil}</option>`
        }
    </script>
@endsection

