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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index');

    /*
     * Por rol de admin o empleado
     */
    Route::group(['middleware' => ['role:admin|employee']], function() {
        /* Informes */
        Route::resource('informe', 'InformesController');
        Route::get(
            'informe/{informe}/delete',
            ['as' => 'informe.showDeleteForm', 'uses' => 'InformesController@showDeleteForm']
        );
        Route::get(
            'informe/{informe}/publicar',
            ['as' => 'informe.publicar', 'uses' => 'InformesController@publicar']
        );
        Route::get(
            'informe/{informe}/conclude',
            ['as' => 'informe.showConcludeForm', 'uses' => 'InformesController@showConcludeForm']
        );
        Route::post(
            'informe/{informe}/conclude',
            ['as' => 'informe.conclude', 'uses' => 'InformesController@conclude']
        );

        /* Conceptos */
        Route::resource('concepto', 'ConceptosController');
        Route::get(
            'informe/{id}/concepto/agregar',
            ['as' => 'concepto.create', 'uses' => 'ConceptosController@create']
        );

        /* Multas */
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

        /* Patentes */
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

        /* Solicitud de baja */
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

        /*ABM de gestores*/
        Route::resource('gestor', 'GestoresController');

        /* Consultas */
        Route::resource('consulta', 'ConsultasController');
        Route::get(
            'consultas/pendientes',
            ['as' => 'consulta.showPendientes', 'uses' => 'ConsultasController@showPendientes']
        );
        Route::get(
            'consultas/respondidas',
            ['as' => 'consulta.showRespondidas', 'uses' => 'ConsultasController@showRespondidas']
        );

    });

    /*
     * Para rol de gestor
     */
    Route::group(['middleware' => ['role:manager']], function() {
        Route::get(
            '/inicio',
            ['as' => 'gestor.dashboard', 'uses' => 'GestoresController@dashboard']
        );
        Route::get(
            '/tramites',
            ['as' => 'gestor.tramites', 'uses' => 'GestoresController@tramites']
        );
        Route::get(
            '/concluidos',
            ['as' => 'gestor.concluidos', 'uses' => 'GestoresController@concluidos']
        );
        Route::get(
            '/ver-informe/{informe}',
            ['as' => 'gestor.showInforme', 'uses' => 'GestoresController@showInforme']
        );
        Route::get(
            'consulta/{informe}/crear',
            ['as' => 'consulta.create', 'uses' => 'ConsultasController@create']
        );
        Route::post(
            'consulta',
            ['as' => 'consulta.store', 'uses' => 'ConsultasController@store']
        );
    });
});
