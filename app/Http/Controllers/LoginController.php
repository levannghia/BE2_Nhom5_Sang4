<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function index()
    {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        // $product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->orderby('products.product_id', 'desc')->get();
        $all_product = DB::table('products')->orderby('product_id', 'asc')->limit(4)->get();
        $product_view = Product::orderby('product_view','DESC')->paginate(3);
        return view('pages.index')->with('category', $cate_product)->with('all_product', $all_product)->with('product_view',$product_view);
    }
    public function admin()
    {
        return view('admin');
    }
    public function getLogin()
    {
        return view('pages.login');
    }
    
    public function postSignIn(Request $request)
    {
        $xacThuc = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($xacThuc)){
            return redirect()->route('home')->with(['flag'=>'success','message'=>'Logged in successfully']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Login failed']);
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
