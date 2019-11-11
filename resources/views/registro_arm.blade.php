@extends('layouts.layouts')
@section('title')
    <title>ARMAMENTO</title>
@endsection

@section('page_content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                <form action="{{route('user.import.excel')}}" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <b><legend>ASIGNACION DE ARMAMENTO</legend></b>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Documento</label>
                            <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Nombre</label>
                            <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">telefono</label>
                            <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="control-label" for="selectbasic">Familiar</label>
                            <select id="selectbasic" name="selectbasic" class="form-control">
                                @foreach($visitante as $visitante)
                                    <option id="">{{$visitante->asociado}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="control-label" for="singlebutton"></label>
                            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
                        </div>


                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="excel" class="subir">
                                    <i class="fas fa-cloud-upload-alt"></i> Cargar Excel
                                </label>

                                @csrf

                                <input type="file" id="excel" onchange='cambiar()'  style='display: none;'/>
                                <div id="info"></div>

                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
@endsection
