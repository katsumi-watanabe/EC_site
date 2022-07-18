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
    $router->get('/genre', 'GenreController@index')->name('genre');
    $router->get('/product', 'ProductController@index')->name('product');
    $router->resource('administrators', AdministratorController::class);

});
