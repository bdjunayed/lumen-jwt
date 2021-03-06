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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/auth/login', 'AuthController@postLogin');

$router->get('user', 'UserController@index');

//$router->group(['middleware' => 'jwt-auth'], function() use ($router)
$router->group(['middleware' => 'auth:api'], function() use ($router)
{
    $router->get('/test', function() {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    });
});
