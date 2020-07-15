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

Route::get('/', 'ClientController@index')->name('get_index');
Route::get('add_product/{idProduct}', 'CartController@cart')->name('get_add_cart');
Route::get('view_cart', 'CartController@show')->name('get_view_cart');
Route::get('update_row_cart/{idDetail}/{quantity}', 'CartController@updateCart')->name('get_update_row_cart');
Route::post('add_order_cart', 'OrderController@orderProduct')->name('post_add_product_cart');



Route::group(['prefix' => 'product'], function () {
    Route::get('/list', 'ProductController@list')->name('get_product_list');
    Route::get('form_create', 'ProductController@create')->name('get_product_create');
    Route::post('store', 'ProductController@store')->name('post_product_store');
    Route::get('edit_form/{id}', 'ProductController@edit')->name('get_product_edit');
    Route::put('update', 'ProductController@update')->name('put_product_update');


    Route::get('entries/{id}', 'EntriesController@create')->name('get_product_entries');
    Route::post('store_entries', 'EntriesController@store')->name('post_product_entries');




});
