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

    Route::resource('users', 'UserCtrl');

    Route::resource('categories', 'CategoryCtrl');

    Route::resource('articles', 'ArticleCtrl');
});

