<?php

namespace App\Http\Controllers;
use DB;
use App\Product;
use App\Review;
use App\Rating;
use App\Comment;
use App\OrderDetail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Prophecy\Revealer;

class ReviewController extends Controller
{
    public function getReview($order_detail_id) {
        $orderDetail = OrderDetail::find($order_detail_id);
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $detail_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('products.product_id', $orderDetail->product_id)->get();
        $comments = Comment::where('product_id',$orderDetail->product_id)->orderBy('created_at',"DESC")->paginate(4);
        $reviews = Review::with('user:id,name')->where('product_id',$orderDetail->product_id)->orderBy('created_at',"DESC")->paginate(4);
        foreach ($detail_product as $value) {
            $category_id = $value ->category_id;
        }
        $rr = Review::find($order_detail_id);
        $relate_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('categories.category_id', $category_id)->whereNotIn('products.product_id', [$orderDetail->product_id])->limit(6)->get();
        return view('review')->with('category', $cate_product)->with('product_details', $detail_product)->with('relate_product', $relate_product)->with('comments', $comments)->with('reviews', $reviews)->with('orderDetail', $orderDetail)->with('rr',$rr);
    }
    public function saveReview(Request $request, $order_detail_id)
    {
        $request->validate(
            [
                'comment' => 'required',
                'rating' => 'max:1',
            ],
            [
                'comment.required' => 'Please write your review.',
                'rating.max' => 'Please choose a rating for the product.',

            ]
        );
        $orderDetail = OrderDetail::find($order_detail_id);
        $review = new Review();
        $review->product_id = $orderDetail->product_id;
        $review->order_detail_id = $order_detail_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->user_id = Auth::id();
        $review->save();
        $product = Product::find($orderDetail->product_id);
        $product->product_total_number += $request->rating;
        $product->product_total_review += 1;
        $product->product_rating = round($product->product_total_number / $product->product_total_review, 2);
        $product->save();
        
        return redirect()->back()->with('thanhcong', 'successful product review');
    }
}
