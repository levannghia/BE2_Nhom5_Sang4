<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
session_start();
class AdminOrderController extends Controller
{
    //start function Admin page
    public function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }
    
    //liệt kê đơn hàng
    public function all_order() {
        $this->AuthLogin();
        $order = DB::table('transactions')->join('users', 'transactions.user_id', '=', 'users.id')->select('transactions.*', 'users.name')->orderby('transactions.transaction_id', 'desc')->get();
        $all_order = view('admin.order.manage_order', ['order' => $order]);
        return view('admin_layout', ['admin.order.manage_order' => $all_order]);
    }
}
