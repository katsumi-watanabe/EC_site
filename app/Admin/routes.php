<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->post('/fileupload', 'FileuploadController@index'); // Add here
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('genre', GenreController::class);
    $router->resource('product', ProductController::class);
    $router->resource('administrators', AdministratorController::class);

});
