<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAllProduct() {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    public function getAllProductByCatalog($id) {
        $products = DB::table('products')->where('catalogid', $id)->get();
        return view('index', ['products' => $products]);
    }
}
