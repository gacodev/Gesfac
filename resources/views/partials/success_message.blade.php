@if(isset($success)&& $success)
    <div class="form-group col-12 col-md-12">
        <div class="alert alert-success" role="alert">
            Los cambios se realizaron con exito
        </div>
    </div>
@endif

@if(isset($success)&& !$success)
    <div class="form-group col-12 col-md-12">
        <div class="alert alert-danger" role="alert">
            Ocurrio un error, no se guardaron cambios
        </div>
    </div>
@endif
