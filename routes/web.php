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

Route::get('/', function () {
    return view('home.master');
});

Route::prefix('products')->group(function () {
    Route::get('/', 'ProductController@index')->name('products.index');
    Route::get('/create', 'ProductController@create')->name('products.create');
    Route::post('/create', 'ProductController@store')->name('products.store');
    Route::post('/filter', 'ProductController@filterCategory')->name('products.filter');
});

