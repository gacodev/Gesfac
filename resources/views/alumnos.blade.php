@extends('layouts.layouts')
@extends('layouts.app')
@section('registro')
<head>
    <title class="text-center">REGISTRO</title>
</head>
<style type="text/css">
    body {
        background: url('https://i.pinimg.com/originals/43/e5/58/43e55831f695f752fd1f60f4dd0ec60a.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }
    .texto{
        color:white;
    }
</style>
<body>

<div class="container text-center">
    <div class="row">


        <!-- form start -->
        <form role="form" id="register-form" autocomplete="off">

            <div class="form-header form-group">

                <h3 class="form-title text-center"><i class="fa fa-user"></i><strong class="texto">ASIGNACION DE ARMAMENTO</strong></h3>

                <div class="form-group col-lg-12">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <label class="texto"><strong> ID </strong></label>
                    <input  type="text" class="form-control" required>
                    <span class="help-block" id="error"></span>
                </div>




                <div class="form-group col-lg-12">
                    <div class="input-group-addon"><span class="glyphicon   glyphicon-lock"></span></div>
                    <label class="texto"><strong> ALUMNO</strong></label>
                    <select class="form-control" >
                </div>
                <option class="form-control">ALUMNO</option>

                </select></div>
            <span class="help-block" id="error"></span>
    </div>



    <div class="form-group col-lg-12">
        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
        <label class="texto"><strong>ESCUADRON</strong></label>
        <select class="form-control" >
    </div>
    <option class="form-control">SELECCIONE SU ESCUADRON</option>

    </select></div>
<span class="help-block" id="error"></span>
<div class="form-group col-lg-12">
    <div class="input-group-addon"></div>
    <label class="texto"><strong>ARMAMENTO</strong></label>
    <select class="form-control" >
</div>
<option class="form-control">FUSIL</option>

</select></div>
<span class="help-block" id="error"></span>


<div class="form-group col-lg-12">
    <button type="submit" class="btn btn-info">
        ASIGNAR
    </button>
</div>

</form>
</div>

</div>
</body>
</html>
@endsection
