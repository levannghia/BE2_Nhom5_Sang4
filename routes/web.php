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
///Frontend
Route::get('/', 'LoginController@index');
Route::get('/trang-chu', 'HomeController@index')->name('home');
Route::get('/404',function(){
    return view('404');
})->name('404');

//danh mục sp - home
Route::get('/danh-muc-san-pham/cate={category_id}', 'AdminCategoryController@show_category_home');

//xem chi tiet sp
Route::get('/chi-tiet-san-pham/id={product_id}', 'ProductController@detail_product');

//them gio hang
Route::post('/save-cart','CartController@save_cart');
Route::get('/cart', 'CartController@show_cart');
//Xóa giỏ hàng
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart');
//Update số lượng
Route::post('/update-cart-qty','CartController@update_cart_qty');

//thanh toán
Route::get('/checkout', 'CheckoutController@show_checkout')->middleware('checklogin');
Route::post('/save-checkout', 'CheckoutController@save_checkout');
//phương thức thanh toán
Route::get('/payment', 'CheckoutController@show_payment')->middleware('checklogin');
Route::post('/order-place', 'CheckoutController@order_place');
//profile
Route::get('/profile','ProfileController@index')->middleware('checklogin')->name('profile');
//order detail
Route::get('/order-detail/{order_id}','ProfileController@orderDetail')->middleware('checklogin');
//edit profile
Route::put('/profile/edit','ProfileController@editProfile')->name('edit-profile');
//change password
Route::get('/change-password','ProfileController@getChangePassword')->name('changepassword');
Route::post('/change-password','ProfileController@saveChangePassword');
//delete account
Route::post('/delete-account','ProfileController@postDestroy')->name('delete-account');
//test chuc nang phan quyen
//Route::get('/admin', 'LoginController@admin')->middleware('permission.checker:admin');
//chuc nang review

Route::post('/review/id={order_detail_id}','ReviewController@saveReview')->middleware('checklogin')->name('save.review');
Route::get('/review/id={order_detail_id}','ReviewController@getReview')->middleware('checklogin');
//chuc nang comment
Route::post('/comment/id={product_id}','CommentController@saveComment')->name('save.comment');
//SignUp
Route::post('/sign-up','LoginController@postSignUp')->name('signup');
//login
Route::get('/login','LoginController@getLogin');
Route::post('/login','LoginController@postSignIn')->name('login');
//logout
Route::get('/logout','LoginController@Logout')->name('logout');
//verifycation email
Auth::routes(['verify' => true]);

//Search
Route::post('/search', 'ProductController@search');
//All Product
Route::get('/show-all-product','ProductController@show_all_product');



///Backend
//Admin
Route::get('/admin','AdminController@admin_login');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard'); //check login admin
Route::get('/admin-logout','AdminController@logout'); //logout

//Category product
//thêm
Route::get('/add-category-product','AdminCategoryController@add_category_product');
//sửa
Route::get('/edit-category/id={category_id}', 'AdminCategoryController@edit_category_product');
//xóa
Route::get('/delete-category/id={category_id}', 'AdminCategoryController@delete_category_product');
//hiển thị
Route::get('/all-category-product','AdminCategoryController@all_category_product');
//xử lý func thêm
Route::post('/save-category-product','AdminCategoryController@save_category_product');
//xử lý func sửa
Route::post('/update-category-product/id={category_id}','AdminCategoryController@update_category_product');

Route::get('/active-category/id={category_id}', 'AdminCategoryController@active_category_product');
Route::get('/unactive-category/id={category_id}', 'AdminCategoryController@unactive_category_product');

//Product
Route::resource('/product','ProductController');
//thêm
Route::get('/add-product','AdminProductController@add_product');
//sửa
Route::get('/edit-product/id={product_id}', 'AdminProductController@edit_product');
//xóa
Route::get('/delete-product/id={product_id}', 'AdminProductController@delete_product');
//hiển thị
Route::get('/all-product','AdminProductController@all_product');
//xử lý func thêm
Route::post('/save-product','AdminProductController@save_product');
//xử lý func sửa
Route::post('/update-product/id={product_id}','AdminProductController@update_product');

//Order
Route::get('/all-order','AdminOrderController@all_order');
Route::get('/view-detail-order/id={orderId}','AdminOrderController@view_order');
//User
Route::get('/all-user','AdminUserController@all_user');
Route::get('/delete-user/id={user_id}', 'AdminUserController@delete_user');

//Review 
Route::get('/all-review','AdminReviewController@all_review');


