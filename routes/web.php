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

Route::get('/', 'PostsController@index');
Route::post('/posts/create', 'PostsController@store')->name('create.post');
Route::get('/posts/destroy/{id}', 'PostsController@destroy')->name('delete.post')->middleware('auth');

Route::post('/orders/create', 'OrdersController@store')->name('create.order');
Route::post('/orders/update/{id}', 'OrdersController@update')->name('update.order')->middleware('auth');
Route::post('/orders/search', 'OrdersController@search')->name('search.order')->middleware('auth');

Route::post('/site/title/update/{id}', 'AboutsController@update')->name('update.abouts')->middleware('auth');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');
