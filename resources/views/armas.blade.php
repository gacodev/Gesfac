@extends('layouts.layouts')

@section('title')
    <title>ARMAMENTO</title>
@endsection


@section('page_content')

    <h2 class="title_page">ARMAS</h2>

    <div class="row table table-responsive">

<div class="form-group row">
    <div class="form-group col-sm-6">
        <form action="">
        <label for="send">FORMANDO</label>
        <input type="text" class="form-control" id="send" >
    </div>
    <button class="btn btn-primary">REPORTAR</button>
    </form>
</div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="total_weapons">
            CONTAR ARMAMENTO
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>CONTEO ARMAMENTO EN ARMERILLO</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">NORINCO</div>
                            <div id="norinco" class="card-body">Contenido</div>
                        </div>

                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">M16</div>
                            <div id="m16" class="card-body">Contenido</div>
                        </div>

                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">GALIL</div>
                            <div id="galil" class="card-body">Contenido</div>
                        </div>
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">TOTAL ARMAMENTO EN ARMERILLO</div>
                            <div id="total_count_weapons" class="card-body">Contenido</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row table table-responsive">
            <table class="table thead-dark  text-center " id="mitabla">
                <thead>

                <tr>
                    <th>ARMAMENTO</th>
                    <th>FUSIL</th>
                    <th>ALUMNO</th>
                    <th>ESCUADRON</th>
                    <th>ARMERILLO</th>
                </tr>

                </thead>


                <tbody>
                @foreach($armas as $arma)
                    <tr>
                        <td>{{$arma->fusil_serial}}</td>
                        <td>{{$arma->tipo_fusil}}</td>
                        <td>{{$arma->alumno}}</td>
                        <td>{{$arma->escuadron}}</td>
                        <td>
                            <div class="onoffswitch">

                                <input type="checkbox" name="onoffswitch" class="arma onoffswitch-checkbox" id="{{$arma->fusil}}" {{$arma->estado?"checked":null}} />

                                <label class="onoffswitch-label" for="{{$arma->fusil}}">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>

        function actualizar_estado_armas(id, estado) {

            axios.post('/actualizarEstadoArmas', {
                id,
                estado
            })
                .then(function(response) {
                    console.log(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        var armas = document.querySelectorAll(".arma");

        for (var i = 0; i < armas.length; i++) {

            var alumno = armas[i]

            alumno.addEventListener('change', function() {
                var estado = null

                if (this.checked) {
                    estado = 1
                } else {
                    estado = 0
                }

                actualizar_estado_armas(this.id, estado)
                // console.log(this.id, estado)
            })
        }

        var total_weapons = document.getElementById("total_weapons")

        total_weapons.addEventListener('click', function() {
            axios.get('/totalWeapons')
                .then(function(response) {
                    document.getElementById("norinco").innerHTML=response.data.norinco
                    document.getElementById("m16").innerHTML=response.data.m16
                    document.getElementById("galil").innerHTML=response.data.galil

                    var total_count_weapons = response.data.norinco + response.data.m16 + response.data.galil

                    document.getElementById("total_count_weapons").innerHTML=total_count_weapons
                })
                .catch(function(error) {
                    console.log(error);
                });
        })

    </script>

@endsection
