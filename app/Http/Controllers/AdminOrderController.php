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
use App\OrderDetail;
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
        $this->AuthLogin();
        
        $orderById = Order::join('users', 'orders.user_id', '=', 'users.id')
        ->join('shipping', 'orders.shipping_id', '=', 'shipping.shipping_id')
        ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
        ->select('users.*', 'shipping.*', 'orders.*', 'order_details.*')->where('orders.order_id', $orderId)->limit(1)->get();
        $orderDetail = OrderDetail::where('order_id',$orderId)->orderBy('order_detail_id',"DESC")->get();
        $order_detail_by_id = view('admin.order.view_order', ['orderById' => $orderById])->with('orderDetail', $orderDetail);
        return view('admin_layout', ['admin.order.view_order'=> $order_detail_by_id]);
    }
}
