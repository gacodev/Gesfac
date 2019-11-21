@extends('layouts.layouts')
@section('title')
    <title>MEDICINA</title>
@endsection
@section('page_content')

    <h2 class="title_page">ATENCION DE CITAS</h2>

    @include("partials.success_message")

    {{--    @include ("partials.modals.solicitar_cita")--}}


    <div class="table-container">
        <table class="table thead-brand bordered  text-center" id="mitabla">
            <thead>
            <tr>
                <th>ESCUADRON</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>SOLICITAR</th>
            </tr>
            </thead>
            <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>{{$cita->escuadron}}</td>
                    <td>{{$cita->nombre}}</td>
                    <td>{{$cita->telefono}}</td>
                    <td>
                        @if($cita->asistencia)
                            <a href="{{route('atendido', $cita->cita)}}">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_agendar">
                                    <i class="fas fa-check"></i>
                                </button>
                            </a>
                        @else
                            <a href="{{route("sanidad_registrar_solicitud", $cita->id)}}">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal_agendar">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
