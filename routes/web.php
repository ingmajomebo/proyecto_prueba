<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/listarVisita',function(){
	return view('listadoVisitas');
});

Route::get('/reportes',function(){
	return view('reporteSistema');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DE CLIENTE

Route::get('/ObtenerClientes','ClienteController@ObtenerClientes');
Route::post('/InsertarCliente','ClienteController@InsertarCliente');
Route::post('/EditCliente','ClienteController@EditCliente');
Route::post('/EliminarCliente','ClienteController@EliminarCliente');

//RUTAS DE VISITA Y PAISES 

Route::get('Visita/listVisita','VisitaController@listVisita');
Route::post('Visita/InsertarVisita','VisitaController@InsertarVisita');
Route::post('Visita/editVisita','VisitaController@editVisita');
Route::post('Visita/eliminarVisita','VisitaController@eliminarVisita');

Route::get('Pdc/listarPaises','ControlPdcController@ObtenerPaises');
Route::post('Pdc/listarDepartamento','ControlPdcController@ObtenerDepartamento');
Route::post('Pdc/listarCiudades','ControlPdcController@ObtenerCiudades');

Route::get('Reporte/CantidadVisitasPorCiudad','EstadisticasController@CantidadVisitasPorCiudad');
Route::post('Reporte/CupoCliente','EstadisticasController@CupoCliente');