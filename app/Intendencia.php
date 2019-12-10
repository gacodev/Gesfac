<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intendencia extends Model
{
    protected $table = 'intendencia';

    protected $fillable = [
        "alumno",
        "articulo",
        "descripcion",
        "cantidad"
    ];
}
