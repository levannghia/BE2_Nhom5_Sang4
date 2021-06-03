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

// Route::get('/', function () {
//     return view('index');
// });
//SignUp
Route::post('/sign-up','LoginController@postSignUp')->name('signup');
//login
Route::get('/login','LoginController@getLogin');
Route::post('/login','LoginController@postSignIn')->name('login');
//logout
Route::get('/logout','LoginController@Logout')->name('logout');

///Home
//get all product
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
//danh mục sản phẩm
Route::get('/danh-muc-san-pham/category_id={id}', 'CategoryController@show_category_home');

///Search product
//tìm kiếm sản phẩm
Route::post('/search-product', 'SearchController@searchProduct');

///Show all product
Route::get('/tat-ca-san-pham', 'ProductController@showAllProduct');
