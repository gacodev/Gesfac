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

            <div class="row">

                <div class="col-12 col-md-6 col-xl-4">
                    <div class=" card mb-4 box-shadow text-center">
                        <div class="card-header">SANIDAD</div>
                        <div class="card-body">
                            <img class="main-image" src="images/logo.png" alt="Card image cap">
                        </div>
                        <div class="card-footer card-footer-custom">
                            <a href="{{route ('sanidad-export')}}" target="blank"><button class="btn btn-primary">VER</button></a><br>
                            <a href="{{route ('export-sanidad-pdf')}}"><button class="btn btn-warning">GENERAR</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class=" card mb-4 box-shadow text-center">
                        <div class="card-header">ARMAMENTO</div>
                        <div class="card-body">
                            <img class="main-image" src="images/logo.png" alt="Card image cap">
                        </div>
                        <div class="card-footer card-footer-custom">
                            <a href="{{route ('armas-export')}}" target="blank"><button class="btn btn-primary">VER</button></a><br>
                            <a href="{{route ('export-armas-pdf')}}"><button class="btn btn-danger">GENERAR</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class=" card mb-4 box-shadow text-center">
                        <div class="card-header">PERSONAL</div>
                        <div class="card-body">
                            <img class="main-image" src="images/logo.png" alt="Card image cap">
                        </div>
                        <div class="card-footer card-footer-custom">
                            <a href="{{route ('personal-export')}}" target="blank"><button class="btn btn-primary">VER</button></a><br>
                            <a href="{{route ('export-personal-pdf')}}" ><button class="btn btn-success">GENERAR</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <script>
        var total_weapons = document.getElementById("total_weapons")

        total_weapons.addEventListener('submit', function() {
            axios.get('/totalWeapons')
                .then(function(response) {
                    document.getElementById("norinco").innerHTML=response.data.norinco
                    document.getElementById("m16").innerHTML=response.data.m16
                    document.getElementById("galil").innerHTML=response.data.galil

                    var total_count_weapons = response.data.norinco + response.data.m16 + response.data.galil

                    document.getElementById("total_count_weapons").innerHTML=total_count_weapons
                })
                .catch(function(error) {
                    console.log(error);
                });
        })

    </script>

@endsection

