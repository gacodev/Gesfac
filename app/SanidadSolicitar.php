<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanidadSolicitar extends Model
{
    protected $table = 'sanidad_solicitar';

    protected $fillable = ["estado"];
}
