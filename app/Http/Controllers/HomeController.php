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
        // $product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->orderby('products.product_id', 'desc')->get();
        $all_product = DB::table('products')->orderby('product_id', 'asc')->limit(4)->get();
        return view('pages.index')->with('category', $cate_product)->with('all_product', $all_product);
    }

    public function detail_product($product_id) {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $detail_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('products.product_id', $product_id)->get();
        $comments = DB::table('comments')->where('product_id',$product_id)->orderBy('created_at',"DESC")->paginate(4);
        $reviews = Review::with('user:id,name')->where('product_id',$product_id)->orderBy('created_at',"DESC")->paginate(4);
        foreach ($detail_product as $value) {
            $category_id = $value ->category_id;
        }
        $relate_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('categories.category_id', $category_id)->whereNotIn('products.product_id', [$product_id])->limit(6)->get();
        return view('pages.product.detail_product')->with('category', $cate_product)->with('product_details', $detail_product)->with('relate_product', $relate_product)->with('comments', $comments)->with('reviews', $reviews);
    }

    // public function detailProduct($product_id)
    // {
    //     $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
    //     $detail_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('products.product_id', $product_id)->get();
    //     $comments = Comment::where('product_id',$product_id)->orderBy('created_at',"DESC")->paginate(4);
    //     foreach ($detail_product as $value) {
    //         $category_id = $value->category_id;
    //     }
    //     $relate_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('categories.category_id', $category_id)->whereNotIn('products.product_id', [$product_id])->limit(6)->get();
    //     $viewData = [        
    //         'category' => $cate_product,
    //         'comments' => $comments,
    //         'product_details' => $detail_product,
    //         'relate_product' => $relate_product,
    //     ];
    //     return view('pages.product.detail_product', $viewData);
    // }
}
