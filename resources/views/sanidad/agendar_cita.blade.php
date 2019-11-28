@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection

@section('page_content')

    <h2 class="title_page">AGENDAR CITAS</h2>

    @include("partials.success_message")

    <div class="table-container">


        <div class="row table table-responsive">
            <table class="table thead-brand bordered  text-center" id="mitabla">
                <thead>
                <tr>
{{--                    <th>CITA</th>--}}
                    <th>ESCUADRON</th>
                    <th>NOMBRE</th>
                    <th>TELEFONO</th>
                    <th>FECHA SOLICITUD</th>
                    <th>DESCRIPCION</th>
                    <th>TIPO CITA</th>
                    <th>AGENDAR</th>
                    <th>ELIMINAR</th>
                </tr>
                </thead>
                <tbody>
                @foreach($citas as $cita)
                    <tr>
{{--                        <td>{{$cita->cita}}</td>--}}
                        <td>{{$cita->escuadron}}</td>
                        <td>{{$cita->nombre}}</td>
                        <td>{{$cita->telefono}}</td>
                        <td>{{$cita->fecha_solicitud}}</td>
                        <td>{{$cita->descripcion}}</td>
                        <td>{{$cita->tipo_cita}}</td>
                        <td>
                            <a href="{{route('sanidad_registro_agendar_cita', $cita->cita)}}">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_agendar">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('limpiar_cita', $cita->cita)}}">
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal_agendar">
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

