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
//get all product
Route::get('/', 'ProductController@getAllProduct');
//get all product by catalog
Route::get('/{id}', 'ProductController@getAllProductByCatalog');

