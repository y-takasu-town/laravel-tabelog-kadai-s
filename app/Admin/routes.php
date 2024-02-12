<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\StoreController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\CategoryStoreController;




Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('categories', CategoryController::class);
    $router->resource('stores', StoreController::class);
    $router->resource('users', UserController::class);    
    $router->resource('category_store', CategoryStoreController::class);    
    $router->resource('company', CompanyController::class);    

});
