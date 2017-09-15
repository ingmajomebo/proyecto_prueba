<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = "visita";
    protected $primaryKey = "idVisita";


    protected $fillable = [
        'fecha', 'valorNeto','valorVisita','observaciones','idVendedor','idCliente'
    ];
}
