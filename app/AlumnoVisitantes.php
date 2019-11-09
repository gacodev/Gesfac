<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoVisitantes extends Model
{
    protected $table = "alumno_visitantes";

    protected $fillable=[
        "alumno",
        "visitante"
    ];

}
