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
        $all_product = DB::table('products')->orderby('product_id', 'DESC')->limit(4)->get();
        $product_view = Product::orderby('product_view','DESC')->paginate(4);
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
        $role = array('role' => 1);
        if(Auth::attempt($xacThuc) && Auth::user()->role == 1){
            return redirect()->route('dashboards');
        }
        elseif(Auth::attempt($xacThuc) && Auth::user()->role == 2){
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('field', 'Login failed. Incorrect account or password');
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
