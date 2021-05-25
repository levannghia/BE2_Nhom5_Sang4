<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class SearchController extends Controller
{
    //Tìm kiếm sản phẩm theo tên sản phẩm
    public function searchProduct(Request $request) {
        $key = $request->keyword;
        $searchproducts = Product::where('product_name', 'LIKE', '%'.$key.'%')->get();
        $all_category = Category::where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        return view('pages.search_product')->with('all_category', $all_category)->with('searchproducts', $searchproducts);
    }
}