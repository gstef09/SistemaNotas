<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/elegir', 'MateriasController@elegir');
    Route::post('guardarseleccion', 'MateriasController@guardarSeleccion');
    Route::group(['prefix' => 'admin'], function(){
	Route::resource('usuarios', 'UsuariosController');
	Route::get('usuarios/{id}/destroy',
		[
			'uses' => 'UsuariosController@destroy',
			'as' => 'admin.usuarios.destroy'
		]);

	Route::resource('alumnos', 'AlumnosController');
	Route::get('alumnos/{id}/destroy',
		[
		'uses' => 'AlumnosController@destroy',
		'as' => 'admin.alumnos.destroy'
		]);

	Route::resource('profesores', 'ProfesoresController');
	Route::get('profesores/{id}/destroy',
		[
		'uses' => 'ProfesoresController@destroy',
		'as' => 'admin.profesores.destroy'
		]);

	Route::resource('materias', 'MateriasController');
	Route::get('materias/{id}/destroy',
		[
		'uses' => 'MateriasController@destroy',
		'as' => 'admin.materias.destroy'
		]);
});

    Route::get('/home', 'HomeController@index');
});
