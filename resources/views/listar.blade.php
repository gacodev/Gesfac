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
                        <div id="norinco" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>



                    </div>

                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">BRAVO</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                        <div id="m16" class="card-body">Contenido</div>
                    </div>

                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">TOTAL ALUMNOS</div>
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

                <th>ALUMNO</th>
                <th>ESCUADRON</th>
                <th>NOVEDAD</th>
            </tr>

            </thead>


            <tbody>
            @foreach($listar as $lista)
                <tr>
                    <td>{{$lista->nombre}}</td>
                    <td>{{$lista->escuadron}}</td>
                    <td>
                        <div class="onoffswitch">

                            <select name="" id="listar">
                                <option value="{{$lista->id}}">{{$lista->novedad}}</option>
                            </select>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
