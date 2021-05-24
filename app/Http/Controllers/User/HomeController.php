<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $topProducts = Product::orderByDesc('product_id')->get();
        return view('users.home', compact('topProducts'));
    }
}
