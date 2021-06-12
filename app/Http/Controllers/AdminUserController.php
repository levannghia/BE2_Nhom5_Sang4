<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\User;
class AdminUserController extends Controller
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

    public function all_user() {
        $this->AuthLogin();
        $user = DB::table('users')->paginate(20);
        $all_user = view('admin.user.all_user', ['user' => $user]);
        return view('admin_layout', ['admin.user.all_user' => $all_user]);
        
    }

    public function delete_user($user_id)
    {
        $this->AuthLogin();
        DB::table('users')->where('id', $user_id)->delete();
        Session::put('message', 'Đã xóa tài khoản');
        return Redirect::to('all-user');
    }
}
