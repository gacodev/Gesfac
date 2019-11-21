<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    public function armerillo()
    {
        return $this->belongsTo('App\armerillo', 'alumno');
    }

    public function Sanidad()
    {
        return $this->belongsTo('App\Sanidad');
    }

}
