<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/usuarios','UsuarioController@getAllUsuarios');
Route::get('/usuarios/{id}','UsuarioController@findById');
Route::delete('/usuarios/{id}','UsuarioController@destroyUsuario');
Route::get('/verificarut/{rut}', 'UsuarioController@verificaRut');

