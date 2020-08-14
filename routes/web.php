<?php

use Illuminate\Support\Facades\Auth;
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


Route::prefix('/')->group(function () {
    Route::get('/', 'ProductController@shop')->name('products.shop');
    Route::get('/show/{id}', 'ProductController@show')->name('products.show');
    Route::get('/cart/{id}', 'CartController@addCart')->name('carts.add');
    Route::get('/cart-show', 'CartController@showCart')->name('carts.show');
    Route::get('/cart-destroy/{id}', 'CartController@destroyIdCart')->name('carts.destroy');
    Route::get('/cart-checkout', 'CartController@checkoutCart')->name('carts.checkout');
    Route::post('cart-payment', 'BillController@payment')->name('carts.payment');
    Route::get('cart-update/{rowId}', 'CartController@updateCart')->name('carts.update');
    Route::get('/search', 'ProductController@searchHome')->name('products.search');

});
Auth::routes();
Route::middleware('auth')->group(function () {

    Route::get('/admin', 'HomeController@index')->name('home');

    Route::prefix('products')->group(function () {
        Route::get('/', 'ProductController@index')->name('products.index');
        Route::get('/create', 'ProductController@create')->name('products.create');
        Route::post('/create', 'ProductController@store')->name('products.store');
        Route::get('/filter', 'ProductController@filterCategory')->name('products.filter');
        Route::get('/search-product', 'ProductController@searchProduct')->name('products.searchProduct');
        Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::post('/edit/{id}', 'ProductController@update')->name('products.update');
    });

    Route::prefix('bills')->group(function () {
        Route::get('/', 'BillController@index')->name('bills.index');
        Route::get('/show-bill/{id}', 'BillController@show')->name('bills.show');
        Route::get('/update-bill/{id}', 'BillController@update')->name('bills.update');
        Route::get('/fitter-status', 'BillController@fitterStatus')->name('bills.status');
    });

});





