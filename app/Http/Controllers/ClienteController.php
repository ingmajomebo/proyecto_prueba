<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function InsertarCliente(Request $request)
    {
    	$cliente = new Cliente();
    	$cliente->dato = $request->dato;
    	$cliente->nit =  Hash::make($request->nit);
    	$cliente->nombreCliente = $request->nombreCliente;
    	$cliente->pais = $request->pais;
		$cliente->departamento = $request->departamento;
		$cliente->ciudad = $request->ciudad;
		$cliente->direccion = $request->direccion;
		$cliente->telefono = $request->telefono;
		$cliente->cupo = $request->cupo;
		$cliente->saldoCupo = $request->cupo;
		$cliente->porcentajeVisitas = $request->porcentajeVisitas;

		if($cliente->save()){
			return response()->json(['success' => true, 'msg' => 'Se guardo Correctamente el cliente' ],200);
		}else{
			return response()->json(['success' => true, 'msg' => 'Hubo algún Error' ],500);
		}
    }

    public function EditCliente(Request $request){
    	$cliente = Cliente::find($request->idCliente);

    	$cliente->dato = $request->dato;
    	$cliente->nit =  $request->nit;
    	$cliente->nombreCliente = $request->nombreCliente;
    	$cliente->pais = $request->pais;
		$cliente->departamento = $request->departamento;
		$cliente->ciudad = $request->ciudad;
		$cliente->direccion = $request->direccion;
		$cliente->telefono = $request->telefono;
		$cliente->cupo = $request->cupo;
		$cliente->porcentajeVisitas = $request->porcentajeVisitas;

		if($cliente->update()){
			return response()->json(['success' => true, 'msg' => 'Se Modifico Correctamente el cliente' ],200);
		}else{
			return response()->json(['success' => true, 'msg' => 'Hubo algún Error' ],500);
		}		

    }

    public function EliminarCliente(Request $request){
    	$cliente = Cliente::find($request->idCliente);

    	if($cliente->delete()){
    		return response()->json(['success' => true, 'msg' => 'Se Elimino Correctamente el cliente' ],200);
    	}else{
    		return response()->json(['success' => true, 'msg' => 'Hubo algún Error' ],500);
    	}

    }

    public function ObtenerClientes(){
    	
    	$clientes = Cliente::all();

    	return response()->json(['success' => true, 'datos' => $clientes ],200);

    }
}
