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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    //Route::get('/inicio', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

    // Rutas para informes
    Route::resource('informe', 'InformesController');

    // Rutas para patentes
    Route::resource('patente', 'PatentesController');

    // Rutas para multas
    Route::resource('multa', 'MultasController');

    // Rutas para gestores
    Route::resource('gestor', 'GestoresController');
    Route::get('/mis-tramites', ['as' => 'gestor.dashboard', 'uses' => 'GestoresController@dashboard']);
    
    // Rutas para consultas
    Route::resource('consultas', 'ConsultasController');

    // Rutas para 
    // Route::resource('', 'Controller');
});

//Route::get('/home', 'HomeController@index')->name('home');
