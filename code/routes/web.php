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

// Route::get('admin/pages/login',['as'=>'admin.pages.getLogin','uses'=>'UserController@getLogin']);
// Route::post('admin/pages/login',['as'=>'admin.pages.postLogin','uses'=>'UserController@postLogin']);
// Route::get('admin/pages/logout',['as'=>'admin.pages.getLogout','uses'=>'UserController@getLogout']);
// Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'HomeController@chitietsanpham']);
// Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'HomeController@loaisanpham']);
// Route::get('lien-he',['as'=>'lienhe','uses'=>'HomeController@lienhe']);
// Route::get('dang-nhap',['as'=>'getDangNhap','uses'=>'HomeController@getDangNhap']);
// Route::post('dang-nhap',['as'=>'postDangNhap','uses'=>'HomeController@postDangNhap']);
// Route::get('dang-ky',['as'=>'getDangKy','uses'=>'HomeController@getDangKy']);
// Route::post('dang-ky',['as'=>'postDangKy','uses'=>'HomeController@postDangKy']);
// Route::get('dang-xuat',['as'=>'getDangXuat','uses'=>'HomeController@getDangXuat']);
// Route::get('cap-nhat-thong-tin-thanh-vien/{id}',['as'=>'getEditUser','uses'=>'HomeController@getEditUser']);
// Route::post('cap-nhat-thong-tin-thanh-vien/{id}',['as'=>'postEditUser','uses'=>'HomeController@postEditUser']);
// Route::get('khóa-tài-khoản',['as'=>'getBlockUser','uses'=>'HomeController@getBlockUser']);
// Route::get('thanh-toan',['as'=>'getThanhToan','uses'=>'HomeController@getThanhToan']);
// Route::post('thanh-toan',['as'=>'postThanhToan','uses'=>'HomeController@postThanhToan']);