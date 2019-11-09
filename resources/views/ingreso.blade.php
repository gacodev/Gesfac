@extends('layouts.layouts')
@section('title')
    <title>INGRESO PERSONAL</title>
@endsection

@section('page_content')

    <a href="{{ url('/borrado') }}"><button type="button" class="btn btn-danger" id="total_weapons">
            ELIMINAR VISITAS
        </button>
    </a>

    <div class="row table table-responsive">
        <table class="table thead-dark  text-center " id="mitabla">
            <thead>


            <tr>
                <th>DOCUMENTO</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>ASOCIADO</th>

            </tr>
            </thead>
            <tbody>
            @foreach($visitante as $visitante)
                <td>{{$visitante->visitante_numero_documento}}</td>
                <td>{{$visitante->visitante}}</td>
                <td>{{$visitante->visitante_telefono}}</td>
                <td>{{$visitante->alumno}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

