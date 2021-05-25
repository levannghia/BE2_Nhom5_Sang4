<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
session_start();

class HomeController extends Controller
{
    public function index() {
        $all_category = Category::where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $all_product = Product::orderby('product_id', 'asc')->limit(4)->get();
        return view('pages.index')->with('all_category', $all_category)->with('all_product', $all_product);
    }
}
