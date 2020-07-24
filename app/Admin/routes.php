<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('commodity', CommodityController::class);
    $router->get('RecommendedFrom', 'CommodityController@RecommendedFrom');
    $router->resource('holders', HolderController::class);
    $router->resource('classification', ClassificationController::class);
    $router->resource('enterprise', EnterpriseController::class);
    $router->resource('investment', InvestmentController::class);
    $router->resource('order', OrderController::class);
    $router->resource('user_info', UserController::class);
});
