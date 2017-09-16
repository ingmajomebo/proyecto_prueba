<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Visita;
use Illuminate\Http\Request;
use DB;
class EstadisticasController extends Controller
{
    public function CantidadVisitasPorCiudad()
    {
        $label=[];
        $datos=[];
        $modelos=DB::table("visita")
            ->join('cliente','cliente.idCliente','=','visita.idCliente')
            ->select(DB::raw('count(*) as cantidad '),'ciudad','pais' )
            ->groupBy(['ciudad','pais'])
            ->get();
        foreach ($modelos as $mol){
            array_push($label,$mol->ciudad);
        }
        foreach ($modelos as $mol){
            array_push($datos,$mol->cantidad);
        }
        return response()->json(["labels"=>$label,"datos"=>$datos],200);
    }

    public function CupoCliente(Request $request)
    {

        $movimientos=[];
        $cliente=Cliente::find($request->id);
        $visitas=Visita::where('idCliente','=',$request->id)->get();
        $cupo=$cliente->cupo;
        foreach ($visitas as $mol){
           $cupo=$cupo - $mol->valorVisita;
            array_push($movimientos,$cupo);
        }
        return response()->json(["movimientos"=>$movimientos],200);
    }
}
