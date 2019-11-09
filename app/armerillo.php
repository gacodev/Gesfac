<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class armerillo extends Model
{
    protected $table = 'armerillo';

    protected $fillable = ['estado'];

//    public $phone = User::find(1)->phone;

    public function alumnos()
    {
        return $this->hasOne('App\alumno', 'id');
    }

}
