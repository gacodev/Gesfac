<style>
 .firm_1{
            position: absolute;
            top: 15cm;

        }
   .firm_2{
            position: absolute;
            top: 15cm;
            left: 42%;
        }

        .firm_3{
            position: absolute;
            top: 15cm;
            left: 80%;
        }

         .acepto, .no-acepto{
            width: 40%;
        }
        .acepto{
            position: absolute;
            top: 10cm;
            left: 30%;
        }
          .no-acepto{
            position: absolute;
            top: 10cm;
            left: 70%;
        }
          .firm_1, .firm_2, .firm_3{
            width: 30%;
        }

        .container-firm{
            position:relative;
            margin-top: 2rem;
        }
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<div class="header text-center">
<h5><strong>Fuerzas Militares de Colombia</strong></h5>
<h5><strong>Fuerza Aerea Colombia</strong></h5>
<img  src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Escudo_Fuerza_Aerea_Colombiana.svg/1200px-Escudo_Fuerza_Aerea_Colombiana.svg.png" width="70" height="70">
</div>


<div class="container-fluid mt-5">
<h5 class="text-center"><strong>Acta de asignacion de armamento</strong></h5>
<p>En el presente documento se asigna el armamentos a el ??  quien se encuentra realizando curso de suboficial en la ESUFA motivo por el cual se procede a asignar el armamento

</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th class="col-sm-2" scope="col">Fusil</th>
      <th class="col-sm-2" scope="col">Serial</th>
      <th class="col-sm-2" scope="col">Proveedores</th>
      <th class="col-sm-2" scope="col">Cartuchos</th>
    </tr>
  </thead>
  <tbody>
    <tr>

      <td>USER_FUSIL</td>
      <td>USER_SERIAL</td>
      <td>USER_PROVEEDORES</td>
      <td>USER_CARTUCHES</td>
    </tr>
  </tbody>
</table>
<table>
    <thead class="text-center"><tr><th>OBSERVACIONES</th></tr></thead>
    <tbody class="mt-4">
        <td>
<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque perferendis
     rerum ad ipsa asperiores excepturi adipisci porro, quisquam sequi blanditiis officia
     nihil minima architecto sapiente, eaque dolore velit maxime molestias.</p></td>
     </tbody>
</table>

<div class="container">
<div class="acepto text-center">
<input  class="d-inline-block" id="acepto" name="acepto" type="checkbox">
<label for="acepto">Acepto</label>
</div>


<div class="no-acepto text-center">
<input id="no-acepto" name="acepto" type="checkbox">
<label for="no-cepto">No Acepto</label>
</div>
</div>
</div>
<div class="container-firm">
    <div class="firm_1">
        <u><b>FIRMA:ALUMNO</b></u>
    </div>

    <div class="firm_2">
        <u><b>FIRMA:ARMERO</b></u>
    </div>

    <div class="firm_3">
        <u><b>FIRMA:COMANDANTE GRUAL</b></u>
    </div>

        </div>
    </div>
<div class="footer fixed-bottom text-center"><footer > realizado el dia $date</footer></div>
</div>
