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


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('/produtos', 'ProdutoController@index');
Route::post('/upload-file', 'ProdutoController@uploadFile');
Route::get('/produtos{produto}', 'ProdutoController@show');


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users', 'UserController@index');
    Route::get('/users{user}', 'UserController@show');
    Route::patch('users/{user}', 'UserController@update');
    Route::get('users/{user}/pedidos', 'UserController@showOrders');
    Route::patch('produtos/{produtos}/unidades/add', 'ProdutoController@updateUnidades');
    Route::patch('pedidos/{pedido}/deliver', 'PedidoController@deliverOrder');
    Route::resource('/pedidos', 'PedidoController');
    Route::resource('/produtos', 'ProdutoController')->except(['index', 'show']);
});
