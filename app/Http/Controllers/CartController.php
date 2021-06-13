<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Product;
use Cart;
session_start();

class CartController extends Controller
{
    
    public function show_cart() {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        return view('pages.carts.cart')->with('category', $cate_product);
    }

    public function save_cart(Request $request) {
        $now = Carbon::now(); 
        $productid = $request->productid_hidden;
        $product_qty = $request->qty;
        
        $product_detail = DB::table('products')->where('product_id', $productid)->first();

        
        
        if($data['qty']= $product_qty > $product_detail->product_quantity){
            return redirect()->back()->with('thatbai','Số lượng bạn cần mua lớn hơn số lượng sản phẩm còn lại trong kho');
        }
        else{
            $data['id']= $product_detail->product_id;
            $data['qty']= $product_qty;
            $data['name']= $product_detail->product_name;
            if($now->diffInDays($product_detail->created_at) >= 5){
                $data['price']= $product_detail->product_price - ($product_detail->product_price*30/100);
            }
            else{
                $data['price']= $product_detail->product_price;
            }
            $data['weight']= $product_detail->product_price;
            $data['options']['image']= $product_detail->product_image;
            Cart::add($data);
            return Redirect::to('/cart');
        }
        
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        
    }

    

    public function delete_cart($rowId) {
        Cart::update($rowId, 0);
        return Redirect::to('/cart');
    }

    public function update_cart_qty(Request $request) {
        $rowId = $request->cart_rowId;
        $qty = $request->cart_qty;
        Cart::update($rowId, $qty);
        return Redirect::to('/cart');
    }
}
