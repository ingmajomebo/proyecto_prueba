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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS DE CLIENTE

Route::get('/ObtenerClientes','ClienteController@ObtenerClientes');

Route::post('/InsertarCliente','ClienteController@InsertarCliente');

//RUTAS DE VISITA Y PAISES 

Route::post('Visita/listVisita','VisitaController@listVisita');
Route::post('Visita/storeVisita','VisitaController@storeVisita');
Route::post('Visita/editVisita','VisitaController@editVisita');
Route::post('Visita/eliminarVisita','VisitaController@eliminarVisita');

Route::get('Pdc/listarPaises','ControlPdcController@listarPaises');
Route::post('Pdc/listarDepartamento','ControlPdcController@listarDepartamento');
Route::post('Pdc/listarCiudades','ControlPdcController@listarCiudades');