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
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/qwe', 'SpaController@index');


//Route::get('/profile', 'Api\UserController@profile');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
//Route::get('{path}','SpaController@index')->where( 'path', '([A-z\d-/_.]+)?' );
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
