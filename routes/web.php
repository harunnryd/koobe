<?php

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
    return redirect()->route('catalogs.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('books', 'BookController');
    Route::resource('categories', 'CategoryController');
    
});


Route::prefix('catalogs')->group(function () {
    Route::get('/', 'CatalogController@index')->name('catalogs.index');
    Route::post('cart', 'CartController@addBook')->name('catalogs.addbook');
});

Route::prefix('carts')->group(function () {
    Route::get('/', 'CartController@show')->name('carts.show');
    Route::patch('/{id}', 'CartController@changeQuantity')->name('carts.quantity');
    Route::delete('/{id}', 'CartController@removeBook')->name('carts.remove');
});
