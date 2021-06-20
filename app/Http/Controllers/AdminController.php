<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('id');
        
        if($admin_id || Auth::id()) {
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }


    public function admin_login() {
        return view('');
    }

    public function show_dashboard() {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $email = $request->email;
        $password = (md5($request->password));

        
        $result = DB::table('users')->where('email',$email)->where('password',$password)->first();
        if ($result) {
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('dashboard');
        }
        else {
            Session::put('message1', 'Email hoặc mật khẩu bị sai, làm ơn nhập lại');
            return Redirect::to('admin');
        }
        
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    
}
