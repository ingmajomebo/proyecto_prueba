<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey = "idCliente";


    protected $fillable = [
      'dato', 'nit','nombreCliente','pais','departamento','ciudad','direccion','telefono','cupo','saldoCupo','porcentajeVisitas'
    ];

}
