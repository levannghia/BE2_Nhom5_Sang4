<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function show_category_home($id) {
        $all_category = Category::where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $all_product_by_category = Product::where('category_id', $id)->get();
        $category_name = Category::where('category_id', $id)->get();
        return view('pages.show_product_by_category')->with('all_category', $all_category)->with('all_product_by_category', $all_product_by_category)->with('category_name', $category_name);
    }
}