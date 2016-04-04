<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', 'UsuariosController');
Route::resource('cadastrar','UsuariosController@create');
Route::get('editar/{id}',['as' => 'usuarios.edit', 'uses'=> 'UsuariosController@edit']);
Route::patch('update/{id}',['as' => 'usuarios.update','uses' => 'UsuariosController@update']);
Route::delete('destroy/{id}',['as' => 'usuarios.destroy','uses' => 'UsuariosController@destroy']);
