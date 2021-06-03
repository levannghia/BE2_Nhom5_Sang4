<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function showAllProduct() {
        $all_category = Category::where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $all_product = Product::orderby('product_id', 'asc')->get();
        return view('pages.show_all_product')->with('all_category', $all_category)->with('all_product', $all_product);
    }
}
