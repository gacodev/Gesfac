@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h1 class="title_page">SOLICITUD Y REGISTRO ATENCION DE CITAS</h1>

    @include("partials.success_message")

    {{--    @include ("partials.modals.solicitar_cita")--}}


    <div class="table-container">
        <table class="table thead-brand bordered  text-center" id="mitabla">
            <thead>
            <tr>
                {{--                <th>CITA</th>--}}
                <th>ESCUADRON</th>
                <th>NOMBRE</th>
                <th>TIPO CITA</th>
                <th>TELEFONO</th>
                <th>FECHA DE SOLICITUD</th>
                <th>FECHA DE ASIGNACION</th>
                <th>ATENDIDO</th>
                <th>ELIMINAR</th>
            </tr>
            </thead>
            <tbody>
            @foreach($citas as $cita)
                <tr>
                    {{--                    <td>{{$cita->cita}}</td>--}}
                    <td>{{$cita->escuadron}}</td>
                    <td>{{$cita->nombre}}</td>
                    <td>{{$cita->tipo_cita}}</td>
                    <td>{{$cita->telefono}}</td>
                    <td>{{$cita->fecha_solicitud}}</td>
                    <td>{{$cita->fecha_asignacion}}</td>
                    <td>
                        @if($cita->asistencia)
                            <a href="{{route('atendido', $cita->cita)}}">
                                <button type="button" class="btn btn-outline-success">
                                    <i class="fas fa-check"></i>
                                </button>
                            </a>
                        @else
                            <a href="{{route('atendido', $cita->cita)}}">
                                <button type="button" class="btn btn-outline-success">
                                    ...
                                </button>
                            </a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('atendido', $cita->cita)}}">
                            <button type="button" class="btn btn-outline-danger">
                                <i class="fas fa-minus"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
