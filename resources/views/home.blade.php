<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <style>

        body {
            background-color: #fff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
            display: flex;
            align-items: center;
            min-width: 100%;
            max-width: 100%;
            min-height: 100vh;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            padding-top: 3rem;
            text-align: center;
            min-width: 100%;
        }

        .title {
            font-size: 60px;
            margin-bottom: 2rem;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .main-image{
            display: block;
            max-width: 7rem;
            max-height: 7rem;
            width: auto;
            height: auto;
            margin: 1rem auto 0;
        }

        .album-modify{
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
    </style>
</head>
<body>
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/login') }}"class="btn btn-default">REGRESAR</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Registrarse</a>
            @endif
        @endauth
    </div>
@endif

<div class="content">

    <div class="title">
        GESFAC
    </div>

    <div class="album album-modify py-5 bg-light" >
        <div class="container">

            <div class="row">
@can('armas')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/armas.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/armas') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            ARMAMENTO
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endcan

    @can('armas')
        <div class="col-sm-6 col-md-3">
            <div class="card mb-4 box-shadow">
                <img class="main-image" src="images/alumnos.jpg" alt="Card image cap">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="btn-group">
                            <a href="{{ url('/listar') }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    ALUMNOS
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
                @can('invitados')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/invitados.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/invitados') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            REGISTRO DE INVITADOS
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endcan

                @can('sanidad')
                <div class="col-sm-4 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/sanidad.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/sanidad') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            SANIDAD
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             @endcan
                @can('registrar_alumno')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/registrar.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/registrar_alumno') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            REGISTRO ALUMNOS
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endcan
                @can('ingreso')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/ingreso.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/ingreso') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            INGRESO
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endcan
@can('reportes')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/reportes.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/reportes') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            REPORTES
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endcan
                    @can('asignar_arm')
                <div class="col-sm-6 col-md-3">
                    <div class="card mb-4 box-shadow">
                        <img class="main-image" src="images/asignar.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/asignar_arm') }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            ASIGNACION
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endcan

                    @can('agendar')
                        <div class="col-sm-6 col-md-3">
                            <div class="card mb-4 box-shadow">
                                <img class="main-image" src="images/agendar.png" alt="Card image cap">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('/agendar') }}">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                                    AGENDAR CITAS
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
