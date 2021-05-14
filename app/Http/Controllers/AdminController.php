<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function admin_login() {
        return view('admin_login');
    }

    public function show_dashboard() {
        return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
        $email = $request->email;
        $password = (md5($request->password));

        $result = DB::table('users')->where('email',$email)->where('password',$password)->first();
        if ($result) {
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('/dashboard');
        }
        else {
            Session::put('message', 'Email hoặc mật khẩu bị sai, làm ơn nhập lại');
            return Redirect::to('/admin');
        }
        
    }

    public function logout() {
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
}
