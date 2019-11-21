@extends('layouts.layouts')

@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page"><b>INFORME DE EXCUSADOS</b></h2>

    <div class="table-container">

        <div class="row table table-responsive">
            <table class="table thead-brand bordered  text-center" id="mitabla">
                <thead>
                <tr>
                    <th>ESCUADRON</th>
                    <th>ALUMNO</th>
                    <th>DIAGNOSTICO/OBSERVACIONES</th>
                    <th>DIAS EXCUSADO</th>
                    <th>DIAS RESTANTES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($informes as $informe)
                    <tr>
                        <td>{{$informe->escuadron}}</td>
                        <td>{{$informe->alumno}}</td>
                        <td>{{$informe->observacion}}</td>
                        <td>{{$informe->dias_novedad}}</td>
                        <td>{{$informe->dias_restantes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
