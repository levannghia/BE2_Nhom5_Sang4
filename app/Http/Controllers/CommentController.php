<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function saveComment(Request $request, $product_id)
    {
        $request->validate(
            [
                'email' => 'required',
                'name' => 'required',
                'comment' => 'required',
            ],
            [
                'email.required' => 'Bạn chưa điền vào trường email.',
                'name.required' => 'Bạn chưa điền vào trường tên.',
                'comment.required' => 'Bạn chưa điền vào trường nhận xét.',
            ]
        );

        $comment = new Comment();
        $comment->product_id = $product_id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->save();
        $product = Product::find($product_id);
        $product->product_total_comment += 1;
        $product->save();
        return redirect()->back()->with('thanhcong', 'You have commented on this product');
    }
}
