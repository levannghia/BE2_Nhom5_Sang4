<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
use App\Comment;
use App\Review;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        
    }
    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $all_product = DB::table('products')->orderby('product_id', 'DESC')->limit(4)->get();
        $product_view = Product::orderby('product_view','DESC')->paginate(4);
        return view('pages.index')->with('category', $cate_product)->with('all_product', $all_product)->with('product_view',$product_view);
    }

    

    
}
