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
    return redirect()->route('listar_usuario');
});

Route::get('/users/list', 'UsersController@list')->name('listar_usuario');

Route::get('/users/create', 'UsersController@create');
Route::post('/users/create', 'UsersController@store')->name('cadastrar_usuario');

Route::get('/users/edit/{id}', 'UsersController@edit');
Route::post('/users/edit/{id}', 'UsersController@update')->name('editar_usuario');

Route::get('/users/remove/{id}', 'UsersController@remove');
