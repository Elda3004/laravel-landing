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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', 'App\Http\Controllers\UserController@get');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
});

Route::get('/countries', 'App\Http\Controllers\CountryController@get');
Route::post('/users', 'App\Http\Controllers\UserController@create');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
