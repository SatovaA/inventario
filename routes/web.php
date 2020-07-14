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

Route::get('/', 'ProductController@list')->name('get_product_list');

Route::group(['prefix' => 'product'], function () {

    Route::get('form_create', 'ProductController@create')->name('get_product_create');
    Route::post('store', 'ProductController@store')->name('post_product_store');
    Route::get('edit_form/{id}', 'ProductController@edit')->name('get_product_edit');
    Route::put('update', 'ProductController@update')->name('put_product_update');

});
