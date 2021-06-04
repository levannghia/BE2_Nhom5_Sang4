<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function index()
    {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        // $product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->orderby('products.product_id', 'desc')->get();
        $all_product = DB::table('products')->orderby('product_id', 'asc')->limit(4)->get();
        return view('pages.index')->with('category', $cate_product)->with('all_product', $all_product);
    }
    public function admin()
    {
        return view('admin');
    }
    public function getLogin()
    {
        return view('pages.login');
    }
    
    public function Logout(){
        Auth::logout();
        return redirect()->back();
    }
}
