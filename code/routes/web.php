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

Route::get('admin/login', 'Auth\LoginController@showLoginForm');
Route::post('admin/login', 'Auth\LoginController@login');

Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');

//Backend
Route::group(['prefix' => 'admin', "middleware"=>"auth"], function() {

    Route::resource('users', 'UserController');

    Route::resource('categories', 'CategoryController');

    Route::resource('articles', 'ArticleController');

    Route::resource('products', 'ProductController');
});


Route::get('','FrontEnd\HomeController@index')->name('home');

Route::get('/categories/{slug}','FrontEnd\HomeController@categories');
Route::get('/news','FrontEnd\HomeController@news');
Route::get('/article/{slug}','FrontEnd\HomeController@article');

Route::get('/product/{id}','FrontEnd\HomeController@product');

Route::post('createUser','FrontEnd\HomeController@register');

Route::post('customer/login','FrontEnd\HomeController@login');

Route::get('customer/logout','FrontEnd\HomeController@logout');