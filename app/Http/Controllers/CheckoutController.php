<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Shipping;
use App\Payment;
use Cart;
use Illuminate\Support\Facades\Auth;

session_start();

class CheckoutController extends Controller
{
    public function show_checkout() {
        return view('pages.checkout.checkout');
    }

    public function save_checkout(Request $request) {

        $data = array();
        $data['shipping_name']= $request->shipping_name;
        $data['shipping_phone']= $request->shipping_phone;
        $data['shipping_email']= $request->shipping_email;
        $data['shipping_address']= $request->shipping_address;
        $data['shipping_note']= $request->shipping_note;
        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function show_payment() {
        return view('pages.checkout.payment');
    }

    public function order_place(Request $request) {
        
        //thêm phương thức thanh toán
        $data = array();
        $data_payment['payment_method']= $request->payment_option;
        $data_payment['payment_status']= 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data_payment);
                                                        
        //thêm giỏ hàng
        $order_data = array();
        $order_data['user_id']= Session::get('id');
        $order_data['shipping_id']= Session::get('shipping_id');
        $order_data['payment_id']= $payment_id;
        $order_data['order_total']= Cart::subtotal();
        $order_data['order_status']= 'Đang chờ xử lý';
        $order_data['created_at'] = Carbon::now();
        $order_id = DB::table('orders')->insertGetId($order_data);
        
        //thêm đơn hàng
        
        $content = Cart::content();
        foreach($content as $item) {
            $order_detail = array();
            $order_detail['order_id']= $order_id;
            $order_detail['product_id']= $item->id;
            $order_detail['product_name']= $item->name;
            $order_detail['product_price']= $item->price;
            $order_detail['sale_quantity']= $item->qty;
            $order_detail_id = DB::table('order_details')->insert($order_detail);
        }
        if($data_payment['payment_method'] == 1) {
            Session::put('message', 'Bạn đã chọn phương thức thanh toán khi nhận hàng. Cảm ơn bạn đã mua hàng');
            
        }else {
            Session::put('message', 'Bạn đã chọn phương thức thanh toán bằng thẻ ATM. Cảm ơn bạn đã mua hàng');
        
        }
        Cart::destroy();
        return Redirect::to('/');
        
    }
}
