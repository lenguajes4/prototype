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
    Route::get(
        'informe/{informe}/showDeleteForm',
        ['as' => 'informe.showDeleteForm', 'uses' => 'InformesController@showDeleteForm']
    );

    // Rutas para conceptos
    Route::resource('concepto', 'ConceptosController');
    Route::get(
        'informe/{id}/concepto/agregar',
        ['as' => 'concepto.create', 'uses' => 'ConceptosController@create']
    );

    // Rutas para multas
    Route::resource('multa', 'MultasController');
    Route::get(
        'informe/{informe}/multa/add',
        ['as' => 'multa.create', 'uses' => 'MultasController@create']
    );
    Route::get(
        'informe/{informe_id}/multa/{multa}/edit',
        ['as' => 'multa.{informe_id}.edit', 'uses' => 'MultasController@edit']
    );
    Route::get(
        'informe/{informe_id}/multa/{multa}/show',
        ['as' => 'multa.{informe_id}.show', 'uses' => 'MultasController@show']
    );

    // Rutas para patentes
    Route::resource('patente', 'PatentesController');
    Route::get(
        'informe/{informe}/patente/add',
        ['as' => 'patente.create', 'uses' => 'PatentesController@create']
    );
    Route::get(
        'informe/{informe_id}/patente/{patente}/edit',
        ['as' => 'patente.{informe_id}.edit', 'uses' => 'PatentesController@edit']
    );
    Route::get(
        'informe/{informe_id}/patente/{patente}/show',
        ['as' => 'patente.{informe_id}.show', 'uses' => 'PatentesController@show']
    );

    // Rutas para solicitud de baja
    Route::get(
        'informe/{informe}/baja-edit',
        ['as' => 'baja.edit', 'uses' => 'InformesController@editBaja']
    );
    Route::post(
        'informe/baja-update',
        ['as' => 'baja.update', 'uses' => 'InformesController@updateBaja']
    );
    Route::get(
        'informe/{informe}/baja-show',
        ['as' => 'baja.show', 'uses' => 'InformesController@showBaja']
    );
    Route::post(
        'informe/baja-destroy',
        ['as' => 'baja.destroy', 'uses' => 'InformesController@destroyBaja']
    );

    // Rutas para gestores
    Route::resource('gestor', 'GestoresController');
    Route::get('/mistramites', ['as' => 'gestor.dashboard', 'uses' => 'GestoresController@dashboard']);
    
    // Rutas para consultas
    Route::resource('consultas', 'ConsultasController');

    // Rutas para 
    // Route::resource('', 'Controller');
});

//Route::get('/home', 'HomeController@index')->name('home');
