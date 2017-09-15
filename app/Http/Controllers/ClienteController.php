<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente

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
		$cliente->saldoCupo = $request->saldoCupo;
		$cliente->porcentajeVisitas = $request->porcentajeVisitas;

		$cliente->save();


    }
}
