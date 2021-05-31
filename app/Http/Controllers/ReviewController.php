<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function saveReview(Request $request, $product_id)
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
        $review = new Review();
        $review->product_id = $product_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->user_id = Auth::id();
        $review->save();
        $product = Product::find($product_id);
        $product->product_total_number += $request->rating;
        $product->product_total_review += 1;
        $product->product_rating = round($product->product_total_number / $product->product_total_review, 2);
        $product->save();
        return redirect()->back()->with('thanhcong', 'successful product review');
    }
}
