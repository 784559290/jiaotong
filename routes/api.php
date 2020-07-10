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

Route::namespace('Api')->group(function () {
     Route::prefix('home')->group(function () {
        Route::post('home', 'HomeControllers@index');
    });
     Route::prefix('login')->group(function () {
        Route::post('code', 'loginControllers@code');
        Route::post('index', 'loginControllers@index');
    });
});
