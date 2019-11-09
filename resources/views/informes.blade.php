@extends('layouts.layouts')

@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page"><b>INFORMES DE SANIDAD</b></h2>

    <div class="table-container">

        <div class="row table table-responsive">
            <table class="table thead-brand bordered  text-center" id="mitabla">
                <thead>
                <tr>
                    <th>ESCUADRON</th>
                    <th>ALUMNO</th>
                    <th>DIAGNOSTICO/OBSERVACIONES</th>
                    <th>EXCUSADO</th>
                    <th>CANTIDAD DE DIAS</th>
                    <th>DIAS RESTANTES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($informes as $informe)
                    <tr>
                        <td>{{$informe->escuadron}}</td>
                        <td>{{$informe->alumno}}</td>
                        <td>{{$informe->observacion}}</td>
                        <td>
                            <div class="onoffswitch">

                                <input type="checkbox" name="onoffswitch" class="informe onoffswitch-checkbox" id="{{$informe->incapacidad}}" {{$informe->excusado?"checked":null}} />

                                <label class="onoffswitch-label" for="{{$informe->incapacidad}}">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </td>
                        <td>{{$informe->dias_incapacidad}}</td>
                        <td>{{$informe->dias_restantes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
