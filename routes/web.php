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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('products', 'ProductController');
Route::resource('wishlist', 'WishlistController');
Route::get('/wishlist/delete/{id}', 'WishlistController@destroy');
Route::post('/wishlist/share', 'WishlistController@share');
