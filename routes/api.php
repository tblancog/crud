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

// List all users  (not required but useful)
Route::get('user', 'UserController@index');

// Show a single user
Route::get('user/{user}', 'UserController@show');

// Delete an user
Route::delete('user/{user}', 'UserController@destroy');

// Update name, email from user
Route::put('user/{user}', 'UserController@update');

// Upload a photo of an specific user
Route::post('user/{user}/upload', 'UserController@upload')->name('user.upload');
