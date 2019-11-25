<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanidad extends Model
{
    protected $table = "sanidad";

    protected $fillable = [
        "alumno"
    ];

    public function Alumno()
    {
        return $this->hasOne('App\Alumno');
    }
}
