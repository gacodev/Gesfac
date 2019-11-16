@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1 class="text-center">RUTA NO EXISTENTE </h1></div>

                    <div class="panel-body text-center">
<p>Esta ruta no esta definida dentro del diseño de este aplicativo porfavor dirijase a la barra de direcciones para poder indicar
su verdadero destino o presione el boton que aparece en la parte inferior del sistema</p>
                        <h1><a class="btn btn-primary modal-sm align-items-md-start" href="{{route('home')}}">VOLVER A LA REALIDAD</a></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
