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


//только для зарегистрированных пользователей
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return factory('App\User', 10)->make();
});

Route::namespace('Api')->group(function () {

    Route::get('/users', 'UsersController@index');
    Route::get('/users/{user}', 'UsersController@show');
    Route::put('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');
    Route::get('/user', 'UserController@index');
    Route::get('/edit_user/{edit_user}', 'UserController@edit');

});

Route::apiResources([
    'new_user' => 'Api\UserController',
]);
Route::get('/profile', 'Api\UserController@profile');
//passport register
Route::post('/reg_pas', 'Api\PassportAuthController@register');
Route::post('/log_pas', 'Api\PassportAuthController@login');

//images
Route::put('/profile', 'Api\UserController@updateProfile');
