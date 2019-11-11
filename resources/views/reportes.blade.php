@extends('layouts.layouts')
@section('title')
    <title>REPORTES</title>
@endsection

@section('page_content')
    <div class="container">
    <div class="content">

        <div class="title_page">
            REPORTES
        </div>
        <div>
        <div class="album album-modify py-5 bg-light" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="main-image" src="images/logo.png" alt="Card image cap">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <div id="sanidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" method="post" action="/asignar_cita">
                                                        {{ csrf_field() }}
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">REPORTE DE SANIDAD</h4>

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times</span>
                                                            </button>

                                                        </div>

                                                        <div class="modal-body">
                                                            <div id="alumno_information" class="form-group col-12 col-md-12"></div>
                                                            <div class="form-group col-12 col-md-12">

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route ('sanidad-export')}}"><button class="btn btn-primary">VER</button></a><br>
                                        <a href="{{route ('export-sanidad-pdf')}}"><button class="btn btn-warning">SANIDAD</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="album album-modify py-5 bg-light" >
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="main-image" src="images/logo.png" alt="Card image cap">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="btn-group">
                                                    <div id="sanidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form class="form-horizontal" method="post" action="/asignar_cita">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">REPORTE DE SANIDAD</h4>

                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times</span>
                                                                        </button>

                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div id="alumno_information" class="form-group col-12 col-md-12"></div>
                                                                        <div class="form-group col-12 col-md-12">

                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{route ('armas-export')}}"><button class="btn btn-primary">VER</button></a><br>
                                                    <a href="{{route ('export-armas-pdf')}}"><button class="btn btn-danger">ARMAMENTO</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                                <div class="album album-modify py-5 bg-light" >
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4 col-md-4">
                                                <div class="card mb-4 box-shadow">
                                                    <img class="main-image" src="images/logo.png" alt="Card image cap">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="btn-group">
                                                                <div id="sanidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" method="post" action="/asignar_cita">
                                                                                {{ csrf_field() }}
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="myModalLabel">REPORTE DE SANIDAD</h4>

                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times</span>
                                                                                    </button>

                                                                                </div>

                                                                                <div class="modal-body">
                                                                                    <div id="alumno_information" class="form-group col-12 col-md-12"></div>
                                                                                    <div class="form-group col-12 col-md-12">

                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="{{route ('personal-export')}}"><button class="btn btn-primary">VER</button></a><br>
                                                                <a href="{{route ('export-personal-pdf')}}"><button class="btn btn-success">PERSONAL</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
@endsection

