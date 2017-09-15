<?php

namespace App\Http\Controllers;

use App\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function listVendedor()
    {
        $vendedores=Vendedor::all();
        return response()->json(['respuesta'=>$vendedores],200);
    }
}
