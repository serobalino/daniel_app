<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'Cors'], function() {
    //jugadores
    Route::resource('juegos', 'juegosController', ['only' => ['index', 'store', 'show', 'update']]);
    Route::resource('jugadores', 'jugadoresController', ['only' => ['index', 'store', 'show', 'update']]);
    Route::resource('palabras', 'palabrasController', ['only' => ['index', 'store', 'show', 'update']]);
    Route::get('palabras/eliminar/{palabra}', 'palabrasController@eliminar');

    //api oxfor
    Route::get('pronunciacion/{palabra}', 'API_oxfor@pronunciar');

    //adminsitrador
    Route::post('login', 'LoginController@postLogin');
    Route::post('login/registrar', 'LoginController@registrar');

});