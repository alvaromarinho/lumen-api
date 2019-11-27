<?php

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

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function() use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api', 'middleware' => 'auth'], function() use ($router) {
    
    $router->group(['prefix' => '/users'], function() use ($router) {
        $router->get('/', 'UsersController@index');
        $router->post('/', 'UsersController@store');
        $router->get('/{id}', 'UsersController@show');
        $router->put('/{id}', 'UsersController@update');
        $router->delete('/{id}', 'UsersController@destroy');

        $router->get('/current', function() {
            return response()->json(Auth::user(), 200);
        });
    });

});

$router->post('/api/login', 'AuthController@login');