@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h1><b>ACCESO DENEGADO</b></h1></div>

                <div class="panel-body">
                    <p>Puedes cambiar los permisos a los que pueden acceder los usuarios en cualquier momento en la aplicación Ajustes
                        roles en tu dispositivo. Recuerda que, si desactivas los permisos, es posible
                        que no puedas utilizar algunas funciones de las aplicaciones del sistema de informacion</p>
                    <h1><a class="btn btn-success align-items-md-start" href="{{route('home')}}">SACAME DE AQUI </a></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
