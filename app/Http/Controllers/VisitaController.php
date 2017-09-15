<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Visita;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    public function listVisita(Request $request){
        $visitas=Visita::where('idCliente','=',$request->idCliente)->get();
        return response()->json(['respuesta'=>$visitas],200);
    }



    public function storeVisita(Request $request)
    {
        $cliente=Cliente::find($request->idCliente);
        $visita = new Visita();
        $visita->fecha=$request->fecha;
        $visita->valorNeto=$request->valorNeto;
        $visita->valorVisita=$request->valorNeto*($cliente->porcentajeVisitas/100);
        if($visita->valorVisita>$cliente->saldoCupo){
            return response()->json(['respuesta'=>'El Saldo Cupo del cliente es insuficiente'],500);
        }
        $cliente->saldoCupo=($cliente->saldoCupo-$visita->valorVisita);
        $visita->observaciones=$request->observaciones;
        $visita->idVendedor=$request->idVendedor;
        $visita->idCliente=$request->idCliente;
        if($visita->save()){
            return response()->json(['respuesta'=>'Visita guardad'],200);
        }else{
            return response()->json(['respuesta'=>'Problema al registrar la visita'],200);
        }
    }

    public function editVisita(Request $request)
    {
        $cliente=Cliente::find($request->idCliente);
        $visita=Visita::find($request->idVisita);
        $visita->fecha=$request->fecha;
        $visita->valorNeto=$request->valorNeto;
        $visita->valorVisita=$request->valorNeto*($cliente->porcentajeVisitas/100);
        if($visita->valorVisita>$cliente->saldoCupo){
            return response()->json(['respuesta'=>'El Saldo Cupo del cliente es insuficiente en este caso elimine la visita'],200);
        }
        $cliente->saldoCupo=($cliente->saldoCupo-$visita->valorVisita);
        $visita->observaciones=$request->observaciones;
        $visita->idVendedor=$request->idVendedor;
        $visita->idCliente=$request->idCliente;

        if ($visita->update()){
            return response()->json(['respuesta'=>'Visita modificada'],200);
        }
        return response()->json(['respuesta'=>'Error al modificar Visita'],500);
    }

    public function eliminarVisita(Request $request)
    {
        $visita=Visita::find($request->idVisita);
        if ($visita->delete()){
            return response()->json(['respuesta'=>'Visita eliminada'],200);
        }
        return response()->json(['respuesta'=>'Error al eliminar Visita'],500);
    }

}
