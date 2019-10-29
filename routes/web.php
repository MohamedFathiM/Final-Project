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
Auth::routes();
Route::get('/','pagecontroller@index')->name('home');


Route::get('/cart','cartController@index')->name('cart');
Route::put('/cart/{id}','cartController@update')->name('cartupdate');
Route::post('/cart','cartController@store')->name('cartstore');
Route::get('/cart/{id}/delete','cartController@destroy')->name('cartdestroy');

Route::get('/checkout','pagecontroller@checkout')->name('checkout');
Route::post('/addcheckout','dashboard_controllers\orderController@store')->name('addcheckout');
Route::get('/product/{id}','pagecontroller@product')->name('product');
Route::post('/product','pagecontroller@RateFun')->name('ratingproduct');

Route::get('/shop/{id}','pagecontroller@sort')->name('sortCategory');
Route::any('/search','pagecontroller@mysearch')->name('searchproduct');
Route::any('/prodsthisweek','pagecontroller@thisweek')->name('thisweek');
Route::any('/comment','pagecontroller@comment')->name('comment');

Route::get('/favourite','favouriteController@index')->name('favourite');









