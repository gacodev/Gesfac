<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = "familiar";

    protected $fillable = [
        "nombre",
        "telefono",
        "direccion",
        "correo",
        "numero_documento",
        "tipo_documento",
        "ocupacion",
        "alumno",
        "tipo_familiar",
    ];
}
