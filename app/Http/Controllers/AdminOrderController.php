<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
use App\Order;
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
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')->select('orders.*', 'users.name')->orderby('orders.order_id', 'desc')->paginate(20);
        $all_order = view('admin.order.manage_order', ['orders' => $orders]);
        return view('admin_layout', ['admin.order.manage_order' => $all_order]);
    }

    //xem đơn hàng

    public function view_order($orderId) {
        return view('admin.order.view_order');
    }
}
