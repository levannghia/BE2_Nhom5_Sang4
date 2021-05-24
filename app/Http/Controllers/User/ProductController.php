<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Carts;

use Session;

class ProductController extends Controller
{
    public function index($id)
    {
        $products = Product::where('product_id', $id)->first();
        return view('users.product', compact('products'));
    }

    public function getDataModelProduct(Request $req)
    {
        $products = Product::where('product_id', $req->id)->first();
        $products->product_price = '$'. number_format($products->product_price);
        return $products;
    }

    public function reivew(Request $req)
    {
        $dataSave = $req->validate([
            'product_id' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required'
        ]);

        $dataSave['user_id'] = 1;
        Review::create($dataSave);

        Session::flash('message', 'Thank you for rating the product!'); 
        return redirect()->back();
    }
}
