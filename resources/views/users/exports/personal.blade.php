
    <div class="row table table-responsive">
        <table class="table thead-dark  text-center " id="mitabla">
            <thead>

            <tr>

                <th>ALUMNO</th>
                <th>ESCUADRON</th>
                <th>NOVEDAD</th>
            </tr>

            </thead>


            <tbody>
            @foreach($listar as $lista)
                <tr>
                    <td>{{$lista->nombre}}</td>
                    <td>{{$lista->telefono}}</td>
                    <td>{{$lista->direccion}}</td>

                    <td>
                        <div class="onoffswitch">

                            <select name="" id="listar">
                                <option value="{{$lista->id}}">{{$lista->novedad}}</option>
                            </select>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
