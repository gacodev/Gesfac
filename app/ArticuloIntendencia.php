<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloIntendencia extends Model
{
    protected $table = "articulo_intendencia";

    protected $fillable = [
        "articulo"
    ];
}
