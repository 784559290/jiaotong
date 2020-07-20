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

     Route::prefix('Commodity')->group(function () {
        Route::post('index', 'CommodityController@index');
        Route::post('details', 'CommodityController@details');
    });
     Route::prefix('enterprise')->group(function () {
        Route::post('index', 'EnterpriseController@index');
        Route::post('details', 'EnterpriseController@details');
    });
     Route::prefix('holders')->group(function () {
        Route::post('index', 'HoldersController@index');
        Route::post('details', 'HoldersController@details');
    });
     Route::prefix('investment')->group(function () {
        Route::post('index', 'InvestmentController@index');
        Route::post('details', 'InvestmentController@details');
    });



    Route::prefix('about')->group(function () {
        Route::post('addressincrease', 'AboutController@addressincrease');
        Route::post('business', 'AboutController@business');
        Route::post('favorite', 'AboutController@favorite');
        Route::post('AddressDetails', 'AboutController@AddressDetails');

    });
    Route::prefix('saveabout')->group(function () {
        Route::post('business', 'SaveAboutController@business');
        Route::post('favorite', 'SaveAboutController@favorite');
    });
    Route::prefix('order')->group(function () {
        Route::post('create', 'OrderController@Create');
    });
});
