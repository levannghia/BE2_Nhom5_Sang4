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
///Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

//danh mục sp - home
Route::get('/danh-muc-san-pham/cate={category_id}', 'CategoryProductController@show_category_home');

//SignUp
Route::post('/sign-up','LoginController@postSignUp')->name('signup');
//login
Route::get('/login','LoginController@getLogin');
Route::post('/login','LoginController@postSignIn')->name('login');
//logout
Route::get('/logout','LoginController@Logout')->name('logout');


///Backend
//Admin
Route::get('/admin','AdminController@admin_login');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard'); //check login admin
Route::get('/logout','AdminController@logout'); //logout

//Category product
//thêm
Route::get('/add-category-product','CategoryProductController@add_category_product');
//sửa
Route::get('/edit-category/id={category_id}', 'CategoryProductController@edit_category_product');
//xóa
Route::get('/delete-category/id={category_id}', 'CategoryProductController@delete_category_product');
//hiển thị
Route::get('/all-category-product','CategoryProductController@all_category_product');
//xử lý func thêm
Route::post('/save-category-product','CategoryProductController@save_category_product');
//xử lý func sửa
Route::post('/update-category-product/id={category_id}','CategoryProductController@update_category_product');

Route::get('/active-category/id={category_id}', 'CategoryProductController@active_category_product');
Route::get('/unactive-category/id={category_id}', 'CategoryProductController@unactive_category_product');

///Product
//thêm
Route::get('/add-product','ProductController@add_product');
//sửa
Route::get('/edit-product/id={product_id}', 'ProductController@edit_product');
//xóa
Route::get('/delete-product/id={product_id}', 'ProductController@delete_product');
//hiển thị
Route::get('/all-product','ProductController@all_product');
//xử lý func thêm
Route::post('/save-product','ProductController@save_product');
//xử lý func sửa
Route::post('/update-product/id={product_id}','ProductController@update_product');
