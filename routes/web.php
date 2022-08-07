<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::view('/', );
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/like/{productId}', 'App\Http\Controllers\LikeController@store')->name('like');
Route::post('/like/{productId}', 'App\Http\Controllers\LikeController@store');
// Route::get('/unlike/{productId}', 'App\Http\Controllers\LikeController@destroy')->name('unlike');
Route::post('/unlike/{productId}', 'App\Http\Controllers\LikeController@destroy');

// Route::get('/', 'SampleController@showPage');
// Route::get('/user', [UserController::class, 'index']);

require __DIR__.'/auth.php';
