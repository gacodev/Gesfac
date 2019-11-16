<div id="modal_solicitar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" method="post" action="/agendar_cita">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">SOLICITAR CITA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group col-12 col-md-12">
                        <label for="agendar_alumno">Alumno</label>
                        <select name="agendar_alumno" id="agendar_alumno" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <label for="agendar_tipo_cita">Tipo Cita</label>
                        <select name="agendar_tipo_cita" id="agendar_tipo_cita" class="form-control">
                            @foreach($citas as $tipo_cita)
                                <option value="{{$tipo_cita->id}}">{{$tipo_cita->tipo_cita}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <label for="fecha_asignacion">Fecha de solicitud</label>
                        <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control" min='2019-11-01' value="{{$fecha_solicitud ?? ''}}" disabled>
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <label for="fecha_asignacion">FECHA DE ASIGNACION</label>
                        <input type="date" name="fecha" id="fecha_asignacion" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="AGENDAR">
                </div>
            </form>
        </div>
    </div>
</div>
