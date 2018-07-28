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
Route::get($prefix.'/auth/register', 'Auth\AuthController@getRegister')->name('auth.register');
Route::post($prefix.'/auth/register', 'Auth\AuthController@postRegister');
Route::post($prefix.'/auth/login', 'Auth\AuthController@postLogin');
Route::get($prefix."/login", function () {
    return view('auth/login');
});
//Auth::routes();
App\Http\Controllers\User\UsersController::routes();
