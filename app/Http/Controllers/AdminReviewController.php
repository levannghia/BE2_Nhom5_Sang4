<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Review;
session_start();

class AdminReviewController extends Controller
{
    //start function Admin page
    public function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id || Auth::id()) {
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }

    public function all_review(){
        $this->AuthLogin();
        $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')
        ->join('products', 'reviews.product_id', '=', 'products.product_id')
        ->join('order_details', 'reviews.order_detail_id', '=', 'order_details.order_detail_id')
        ->select('users.*', 'products.*', 'order_details.*', 'reviews.*')->paginate(20);
        $review_by_id = view('admin.review.manage_review', ['reviews' => $reviews]);
        return view('admin_layout', ['admin.review.manage_review'=> $review_by_id]);
    }
}
