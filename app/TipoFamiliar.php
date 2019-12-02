<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFamiliar extends Model
{
    protected $table = "tipo_familiar";

    protected $fillable = [
        "tipo_familiar",
    ];
}
