<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table = 'alumnos';

    public function armerillo()
    {
        return $this->belongsTo('App\armerillo', 'alumno');
    }

}
