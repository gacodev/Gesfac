<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoNovedad extends Model
{
    protected $table = "alumno_novedad";

    protected $fillable = [
        "novedad",
        "alumno",
        "fecha_inicio",
        "fecha_final",
        "excusado",
    ];

}
