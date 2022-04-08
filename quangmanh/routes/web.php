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



Route::get('rigister','RegisterController@register');
Route::post('rigister','RegisterController@post_register');


Route::post('admin','LoginController@post_login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout','HomeController@logout');

Route::middleware('adminLogin')->group(function(){
    Route::get('list','RegisterController@list')->name('list');
      Route::middleware('userLogin')->group(function(){
        Route::get('addUsers','UserController@addUsers');
        Route::post('addUsers','UserController@post_addUsers');
           });
    });


