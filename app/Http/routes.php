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
$prefix = "/toolstest";

Route::get($prefix."/", function () {
    return view('welcome');
});
Route::get($prefix.'/auth/login', 'Auth\AuthController@getLogin');
Route::post($prefix.'/auth/login', 'Auth\AuthController@postLogin')->name('auth.login');;
Route::get($prefix.'/auth/logout', 'Auth\AuthController@getLogout')->name('logout');
Route::get($prefix.'/auth/register', 'Auth\AuthController@getRegister');
Route::get($prefix.'/auth/activate','Auth\AuthController@activate');
Route::post($prefix.'/auth/register', 'Auth\AuthController@postRegister')->name('auth.register');

App\Http\Controllers\User\UsersController::routes();
App\Http\Controllers\Tools\ToolsController::routes();
