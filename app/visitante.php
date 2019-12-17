<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitante extends Model
{

    protected $fillable =[
        "tipo_documento",
        "numero_documento",
        "nombre",
        "telefono",
        "alumno",
        "parentesco",
    ];

    protected $table = "visitantes";
}
