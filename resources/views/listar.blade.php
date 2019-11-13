@extends('layouts.layouts')

@section('title')
    <title>ALUMNOS</title>
@endsection


@section('page_content')

    <!-- trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="total_weapons">
        CONTAR ALUMNOS
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>TOTAL ALUMNOS</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">ALFA</div>
                        <div id="norinco" class="card-body">
                            <ul style="list-style-type: none">
                                <li>FORMAN:</li>
                                <li>EXCUSADOS:</li>
                                <li>SERVICIO:</li>
                                <li>COMISION EXTERIOR:</li>
                                <li>COMISION INTERIOR:</li>
                                <li>TURNO:</li>
                                <li>ADMINISTRATIVA:</li>
                                <li>CLASE:</li>
                                <li>GRALU:</li>
                                <li>AUTORIZADOS:</li>
                                <li><b>TOTAL:</b></li>
                            </ul>
                        </div>




                    </div>

                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">BRAVO</div>
                        <div id="norinco" class="card-body">
                            <ul style="list-style-type: none">
                                <li>FORMAN:</li>
                                <li>EXCUSADOS:</li>
                                <li>SERVICIO:</li>
                                <li>COMISION EXTERIOR:</li>
                                <li>COMISION INTERIOR:</li>
                                <li>TURNO:</li>
                                <li>ADMINISTRATIVA:</li>
                                <li>CLASE:</li>
                                <li>GRALU:</li>
                                <li>AUTORIZADOS:</li>
                                <li><b>TOTAL:</b></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">TOTAL ALUMNOS</div>
                        <div id="total_count_weapons" class="card-body text-center"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row table table-responsive">
        <table class="table thead-dark  text-center " id="mitabla">
            <thead>

            <tr>
                <th>ESCUADRON</th>
                <th>ALUMNO</th>
                <th>EXCUSADO</th>
                <th>NOVEDAD</th>
            </tr>

            </thead>


            <tbody>
            @foreach($listar as $lista)
                <tr>
                    <td>{{$lista->escuadron}}</td>
                    <td>{{$lista->alumno}}</td>
                    <td>
                        <div class="onoffswitch">

                            <input type="checkbox" name="onoffswitch" class="arma onoffswitch-checkbox" id="{{$lista->id}}" {{$lista->excusado?"checked":null}} />

                            <label class="onoffswitch-label" for="{{$lista->id}}">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </td>
{{--                    <td>{{$lista->excusado?"si":"no"}}</td>--}}
                    <td>
{{--                        <select class="form-control" name="" id="">--}}
{{--                            <option value="">{{$lista->novedad}}</option>--}}
{{--                        </select>--}}
                        {{Form::select('sede', $novedades, $lista->novedad, array('class'=>'form-control', 'placeholder'=>'Seleccionar ...'))}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
