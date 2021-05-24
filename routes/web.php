<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => ''], function () {
    Route::get('/', 'User\HomeController@index')->name('home');

    Route::get('/product.html/{id}', 'User\ProductController@index');
    Route::post('/product.html', 'User\ProductController@getDataModelProduct');
    Route::post('/review.html', 'User\ProductController@reivew');

    Route::get('/cart.html/{id}', 'User\CartController@addSingleProduct');
    Route::post('/cart.html', 'User\CartController@addByQuantityProduct');
    Route::get('/cart-remove.html/{id}', 'User\CartController@removeProductCart');

    Route::get('/checkout.html', 'User\CartController@checkout');
    Route::post('/checkout.html', 'User\CartController@postCheckout');
});

//SignUp
Route::post('/sign-up','LoginController@postSignUp')->name('signup');
//login
Route::get('/dangnhap','LoginController@getLogin');
Route::post('/login','LoginController@postSignIn')->name('login');
//logout
Route::get('/logout','LoginController@Logout')->name('logout');
//verifycation email
Auth::routes(['verify' => true]);

Route::get('/home', 'LoginController@index')->name('home');
Route::resource('/product','ProductController');
