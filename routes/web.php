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


Route::get('/', 'ProductController@shop')->name('products.shop');
Route::get('/show/{id}', 'ProductController@show')->name('products.show');
Route::get('/cart/{id}', 'CartController@addCart')->name('carts.add');
Route::get('/cart-show', 'CartController@showCart')->name('carts.show');
Route::get('/cart-destroy/{id}', 'CartController@destroyIdCart')->name('carts.destroy');

Route::prefix('products')->group(function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/create', 'ProductController@store')->name('products.store');
    Route::get('/filter', 'ProductController@filterCategory')->name('products.filter');

});

