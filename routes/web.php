<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// route untuk registrasi 
$router->post('/registrasi',['uses' => 'RegistrasiController@registrasi']);

// route untuk login 
$router->post('/login',['uses' => 'LoginController@login']);

// route untuk produk
$router->group(['prefix' => 'produk'], function($router) {
    $router->post('/', ['uses' => 'ProdukController@Create']);
    $router->get('/', ['uses' => 'ProdukController@List']);
    $router->get('/{id}', ['uses' => 'ProdukController@Show']);
    $router->post('/{id}/update', ['uses' => 'ProdukController@Update']);
    $router->delete('/{id}', ['uses' => 'ProdukController@Delete']);

});