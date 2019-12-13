<html>



<head>
    <style>
        header{
            text-align: center;
            margin-bottom: 1rem;
        }

        body{
            margin: 1rem 1rem 1rem 1.5rem;
        }

        .container{
            min-width: 100vw;
            position: relative;
        }

        .container:nth-child(2){
            margin-top: -80%;
            margin-left: 80%;
        }

        table, td, tr, th{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: .9rem;
        }

        .table_2{
            position: absolute;
            top: 0;
            left: 51%;
        }

        .subtitle{
            display: block;
            font-size: 1rem;
            border: 1px solid black;
            padding: .5rem;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1rem;
            text-align: center;
        }

        .firm_1, .firm_2, .firm_3{
            width: 30%;
        }

        .container-firm{
            position:relative;
            margin-top: 2rem;
        }

        .firm_2{
            position: absolute;
            top: 0;
            left: 42%;
        }

        .firm_3{
            position: absolute;
            top: 0;
            left: 80%;
        }

        .total{
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .text-center{
            text-align: center;
        }

    </style>
</head>

<body>

<header>
    <b>FUERZAS MILITARES DE COLOMBIA <br> FUERZA AEREA COLOMBIANA<br>
        ESCUELA DE SUBOFICIALES <br>CT ANDRES M DIAZ</b>
</header>

<div>
    <div class="subtitle">REPORTE DE SANIDAD</div>
</div>

<div class="container">
    <table cellpadding="5" width="48%" class="text-center">
        <thead>
        <tr>
            <th colspan="2"><b>FECHA</b></th>
            <th colspan="2"  rowspan="2" class="text-center"><b>ALFA</b></th>
        </tr>
        <tr>
            <th colspan="2"><b></b></th>
        </tr>
        <tr>
            <th><b>DESDE</b></th>
            <th><b>HASTA</b></th>
            <th width="40%"><b>EXCUSADOS</b></th>
            <th><b>NOVEDAD</b></th>
        </tr>
        <thead>
        <tbody>
        @foreach($ALFA as $alfa)
        <tr>
            <td>{{$alfa->fecha_asignacion}}</td>
            <td>{{$alfa->fecha_incapacidad}}</td>
            <td>{{$alfa->alumno}}</td>
            <td>{{$alfa->novedad}}</td>
        </tr>
        @endforeach
        <tr>
            <td>Total</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>

    <table cellpadding="5" width="48%" class="table_2 text-center">
        <thead>
        <tr>
            <th colspan="2"><b>FECHA</b></th>
            <th colspan="2"  rowspan="2" class="text-center"><b>BRAVO</b></th>
        </tr>
        <tr>
            <th colspan="2"><b></b></th>
        </tr>
        <tr>
            <th><b>DESDE</b></th>
            <th><b>HASTA</b></th>
            <th width="40%"><b>EXCUSADOS</b></th>
            <th><b>NOVEDAD</b></th>
        </tr>
        <thead>
        <tbody>
        @foreach($BRAVO as $bravo)
            <tr>
                <td>{{$bravo->fecha_asignacion}}</td>
                <td>{{$bravo->fecha_incapacidad}}</td>
                <td>{{$bravo->alumno}}</td>
                <td>{{$bravo->novedad}}</td>
            </tr>
        @endforeach
        <tr>
            <td>Total</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="total">
    TOTAL:
</div>

<div class="container-firm">
    <div class="firm_1">
        <u><b>COMANDANTE ESUFA</b></u>
    </div>

    <div class="firm_2">
        <u><b>CONTROL ALUMNOS</b></u>
    </div>

    <div class="firm_3">
        <u><b>COMANDANTE GRUAL</b></u>
    </div>
</div>

</body>
</html>
