<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudad";
    protected $primaryKey = "nombreCiudad";


    protected $fillable = [
        'nombreCiudad',
        'idDepartamento'
    ];
}
