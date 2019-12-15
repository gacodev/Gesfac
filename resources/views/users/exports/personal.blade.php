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

        /*.table-container:last-child{*/
        /*    margin-top: -80%;*/
        /*    margin-left: 80%;*/
        /*}*/

        .container:nth-child(2){
            margin-top: -80%;
            margin-left: 80%;
        }

        .table-container{
            min-width: 50vw;
            max-width: 50vw;
        }

        /*table{*/
        /*    width: 48%;*/
        /*}*/

        table, td, tr{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: .9rem;
        }

        .center{
            text-align: center;
        }

        .table_2{
            position: absolute;
            top: 0;
            left: 35%;
        }

        .table_3{
            position: absolute;
            top: 0;
            left: 57%;
        }

        .table_4{
            position: absolute;
            top: 0;
            left: 80%;
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

    </style>
</head>
<body>

<header>
    <b>FUERZAS MILITARES DE COLOMBIA <br> FUERZA AEREA COLOMBIANA<br>
        ESCUELA DE SUBOFICIALES <br>CT ANDRES M DIAZ</b>
</header>

<div>
    <div class="subtitle">PARTE PERSONAL</div>
</div>

<div class="container">
    <table cellpadding="5" width="32%">
        <tbody>
        <tr>
            <td><b>FECHA</b></td>
            <td colspan="2" class="text-center"><b>ALFA</b></td>
        </tr>
        <tr>
            <td><b></b></td>
            <td><b>DISTINGUIDOS</b></td>
            <td><b>ALUMNOS</b></td>
        </tr>
        <tr>
            <td><b>FUERZA EFECTIVA</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td><b>IIAFA</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["IIAFA"]}}</td>
        </tr>
        <tr>
            <td><b>SERVICIOS</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["SERVICIO"]}}</td>

        </tr>
        <tr>
            <td><b>PERMISO</b></td>
            <td class="center">&nbsp;</td>
            <td class="center"></td>
        </tr>
        <tr>
            <td><b>ADMINISTRATIVA</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["ADMINISTRATIVA"]}}</td>
        </tr>
        <tr>
            <td><b>SANIDAD</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["SANIDAD"]}}</td>
        </tr>
        <tr>
            <td><b>HMC</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td><b>EXC CASA</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td><b>EXC ESUFA</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td><b>OTROS</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td><b>TOTAL NOVEDADES</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["TOTAL_NOVEDADES"]}}</td>
        </tr>
        <tr>
            <td><b>FORMAN</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["NINGUNA"]}}</td>
        </tr>
        <tr>
            <td><b>TOTAL</b></td>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["ALFA"]["TOTAL"]}}</td>
        </tr>
        </tbody>
    </table>

    <table cellpadding="5" width="20%" class="table_2">
        <tbody>
        <tr>
            <td colspan="2" class="text-center"><b>BRAVO</b></td>
        </tr>
        <tr>
            <td><b>DISTINGUIDOS</b></td>
            <td><b>ALUMNOS</b></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["IIAFA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["SERVICIO"]}}</td>

        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center"></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["ADMINISTRATIVA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["SANIDAD"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["TOTAL_NOVEDADES"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["NINGUNA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["BRAVO"]["TOTAL"]}}</td>
        </tr>
        </tbody>
    </table>

    <table cellpadding="5" width="20%" class="table_3">
        <tbody>
        <tr>
            <td colspan="2" class="text-center"><b>DELTA</b></td>
        </tr>
        <tr>
            <td><b>DISTINGUIDOS</b></td>
            <td><b>ALUMNOS</b></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["IIAFA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["SERVICIO"]}}</td>

        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center"></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["ADMINISTRATIVA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["SANIDAD"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["TOTAL_NOVEDADES"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["NINGUNA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["DELTA"]["TOTAL"]}}</td>
        </tr>
        </tbody>
    </table>

    <table cellpadding="5" width="20%" class="table_4">
        <tbody>
        <tr>
            <td colspan="2" class="text-center"><b>CHARLIE</b></td>
        </tr>
        <tr>
            <td><b>DISTINGUIDOS</b></td>
            <td><b>ALUMNOS</b></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["IIAFA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["SERVICIO"]}}</td>

        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center"></td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["ADMINISTRATIVA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["SANIDAD"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">&nbsp;</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["TOTAL_NOVEDADES"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["NINGUNA"]}}</td>
        </tr>
        <tr>
            <td class="center">&nbsp;</td>
            <td class="center">{{$novedades_escuadrones["CHARLIE"]["TOTAL"]}}</td>
        </tr>
        </tbody>
    </table>

</div>

<div class="total">
    TOTAL ALUMNOS:
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
