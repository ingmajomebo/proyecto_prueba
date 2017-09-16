<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Visita;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class VisitaController extends Controller
{
    public function listVisita(Request $request){
        $sql = "SELECT * FROM visita INNER JOIN cliente 
                                     ON(visita.idCliente = cliente.idCliente) 
                                     INNER JOIN vendedor 
                                     ON(vendedor.idVendedor = visita.idVendedor)";
        try {
            $consulta = DB::select($sql);
            return response()->json(["success" => true, "datos" => $consulta],200);
        } catch (QueryException $ex) {
            return response()->json(["success" => false,"msg" => "Hubo algún error"],500);          
        }
    }

    public function InsertarVisita(Request $request)
    {
        $cliente=Cliente::find($request->idClienteVisita);
        $visita = new Visita();
        $visita->fecha=$request->fecha;
        $visita->valorNeto=(int)$request->valorNeto;
        $visita->valorVisita=(int)$request->valorNeto*($cliente->porcentajeVisitas/100);
        if($visita->valorVisita>$cliente->saldoCupo){
            return response()->json(["success" => false,'msg'=>'El Saldo Cupo del cliente es insuficiente'],500);
        }
        $cliente->saldoCupo=($cliente->saldoCupo-$visita->valorVisita);
        $visita->observaciones=$request->observaciones;
        $visita->idVendedor=$request->idVendedor;
        $visita->idCliente=$request->idClienteVisita;
        if($visita->save()){
            return response()->json(["success" => true, 'msg'=>'Visita guardad'],200);
        }else{
            return response()->json(["success" => false, 'msg'=>'Problema al registrar la visita'],200);
        }
    }

    public function editVisita(Request $request)
    {
        $cliente=Cliente::find($request->idClienteVisita);
        $visita=Visita::find($request->idVisita);
        $visita->fecha=$request->fecha;
        $visita->valorNeto=$request->valorNeto;
        $visita->valorVisita=$request->valorNeto*($cliente->porcentajeVisitas/100);


        if($visita->valorVisita>$cliente->saldoCupo){
            return response()->json(['msg'=>'El Saldo Cupo del cliente es insuficiente en este caso elimine la visita'],200);
        }
        $cliente->saldoCupo=($cliente->saldoCupo-$visita->valorVisita);
        $visita->observaciones=$request->observaciones;
        $visita->idVendedor=$request->idVendedor;
        $visita->idCliente=$request->idClienteVisita;

        if ($visita->update()){
            return response()->json(['success'=> true, 'msg'=>'Visita modificada'],200);
        }
        return response()->json(['success'=> false, 'msg'=>'Error al modificar Visita'],500);
    }

    public function eliminarVisita(Request $request)
    {
        $visita=Visita::find($request->idVisita);
        if ($visita->delete()){
            return response()->json(["success" => true, 'msg'=>'Visita eliminada'],200);
        }
        return response()->json(["success" => false ,'respuesta'=>'Error al eliminar Visita'],500);
    }

}
