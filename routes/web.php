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

Route::get('/', function () {
    return view('index');
})->name('home');
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
//profile
Route::get('/profile','ProfileController@index')->name('profile');
//edit profile
Route::put('/profile/edit','ProfileController@editProfile')->name('edit-profile');
//change password
Route::get('/change-password','ProfileController@getChangePassword')->name('changepassword');
Route::post('/change-password','ProfileController@saveChangePassword');
//delete account
Route::post('/delete-account','ProfileController@postDestroy')->name('delete-account');
