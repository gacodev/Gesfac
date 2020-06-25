<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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

        table, td, tr{
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
            left: 22%;
        }

        .firm_3{
            position: absolute;
            top: 0;
            left: 60%;
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
    <div class="subtitle">PARTE DE ARMAMENTO</div>
</div>


<div class="text-center"><h5>Escuadron </h5></div>
<table class="table table-bordered text-center">
  <thead class="thead-dark">
    <tr>
        <th scope="col" COLSPAN="1">ELEMENTOS</th>
      <th scope="col" COLSPAN="1">NORINCO</th>
      <th scope="col" COLSPAN="1">M16</th>
      <th scope="col" COLSPAN="1">GALIL</th>
    </tr>

  </thead>
  <tbody>
  <tr>
      <td>FUSILES</td>
      <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>

    <tr>
      <td>PROVEEDORES</td>
        <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>
   <tr>
      <td>CARTUCHOS</td>
      <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>

  </tbody>
</table>




<div class="text-center"><h5>Escuadron </h5></div>
<table class="table table-bordered text-center">
  <thead class="thead-dark">
    <tr>
        <th scope="col" COLSPAN="1">MATERIAL DE GUERRA</th>
      <th scope="col" COLSPAN="1">NORINCO</th>
      <th scope="col" COLSPAN="1">M16</th>
      <th scope="col" COLSPAN="1">GALIL</th>
    </tr>

  </thead>
  <tbody>
  <tr>
      <td>FUSILES</td>
      <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>

    <tr>
      <td>PROVEEDORES</td>
        <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>
   <tr>
      <td>CARTUCHOS</td>
      <td>data 1</td>
      <td>data 2</td>
       <td>data 3</td>
    </tr>

  </tbody>
</table>


<div class="container-firm mt-">
    <div class="firm_2">
        <u><b>CONTROL ALUMNOS</b></u>
    </div>

    <div class="firm_3">
        <u><b>COMANDANTE GRUAL</b></u>
    </div>
</div>


 <script>
        var total_weapons = axios.get('/totalWeapons')
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
</body>
</html>
