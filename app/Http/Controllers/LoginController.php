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
    public function postSignUp(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|unique:users,email|',
                'password' => 'required|min:6',
                'name' => 'required',
                'ConfirmPassword' => 'required|same:password',
            ],
            [
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'email.unique' => 'Email đã có người sử dụng'
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->telephone = $request->phone;
        $user->role = 0;
        $user->save();
        return redirect()->route('login')->with('thanhcong', 'Account successfully created');
    }

    public function postSignIn(Request $request)
    {
        $xacThuc = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($xacThuc)) {
            return redirect()->route('/trang-chu')->with(['flag' => 'success', 'message' => 'Logged in successfully']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Login failed']);
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
