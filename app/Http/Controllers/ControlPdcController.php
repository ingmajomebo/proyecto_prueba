<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Pais;
use Illuminate\Http\Request;

class ControlPdcController extends Controller
{
    public function listarPaises()
    {
        $pais=Pais::all();
        return response()->json(['respuesta'=>$pais],200);

    }

    public function listarDepartamento(Request $request)
    {
        $departamentos=Departamento::where('idPais','=',$request->idPais)->get();
        return response()->json(['respuesta'=>$departamentos],200);
    }

    public function listarCiudades(Request $request)
    {
        $ciudades=Ciudad::where('idDepartamento','=',$request->idDepartamento)->get();
        return response()->json(['respuesta'=>$ciudades],200);
    }
}
