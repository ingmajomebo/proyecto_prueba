<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Departamento;
use App\Pais;
use Illuminate\Http\Request;

class ControlPdcController extends Controller
{
    public function ObtenerPaises()
    {
        $pais=Pais::all();
        return response()->json(['success' => true ,'datos'=>$pais],200);

    }

    public function ObtenerDepartamento(Request $request)
    {
        $departamentos=Departamento::where('idPais','=',$request->idPais)->get();
        return response()->json(['success' => true ,'datos'=>$departamentos],200);
    }

    public function ObtenerCiudades(Request $request)
    {
        $ciudades=Ciudad::where('idDepartamento','=',$request->idDepartamento)->get();
        return response()->json(['success' => true ,'datos'=>$ciudades],200);
    }
}
