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

class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id) {
            return Redirect::to('dashboard');
        }
        else {
            return Redirect::to('admin')->send();
        }
    }
    //hiển thị trang thêm sp
    public function add_product() {
        $this->AuthLogin();
        $cate_product = DB::table('categories')->orderby('category_id', 'desc')->get();
        return view('admin.product.add_product')->with('cate_product', $cate_product);
    }

    //liệt kê sp
    public function all_product() {
        $this->AuthLogin();
        $product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->orderby('products.product_id', 'desc')->get();
        $all_product = view('admin.product.all_product', ['product' => $product]);
        return view('admin_layout', ['admin.product.all_product' => $all_product]);
    }

    //chỉnh sửa sp
    public function edit_product($product_id) {
        $this->AuthLogin();
        $cate_product = DB::table('categories')->orderby('category_id', 'desc')->get();
        $product = DB::table('products')->where('product_id', $product_id)->get();
        $edit_product = view('admin.product.edit_product', ['product' => $product])->with('cate_product', $cate_product);
        return view('admin_layout', ['admin.product.edit_product' => $edit_product]);
    }


    ///Các hàm xử lý
    //xử lý thêm sp
    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name']= $request->product_name;
        $data['product_description']= $request->product_desc;
        $data['product_content']= $request->product_content;
        $data['product_price']= $request->product_price;
        $data['category_id']= $request->product_cate;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_fileName = $get_image->getClientOriginalName();
            $fileName = current(explode('.',$get_fileName));
            $fileExtension=$get_image->getClientOriginalExtension();
            $new_image = $fileName.'-'.time().'.'.$fileExtension;
            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('products')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    //xử lý chức năng sửa
    public function update_product(Request $request, $product_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name']= $request->product_name;
        $data['product_description']= $request->product_desc;
        $data['product_content']= $request->product_content;
        $data['product_price']= $request->product_price;
        $data['category_id']= $request->product_cate;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_fileName = $get_image->getClientOriginalName();
            $fileName = current(explode('.',$get_fileName));
            $fileExtension=$get_image->getClientOriginalExtension();
            $new_image = $fileName.'-'.time().'.'.$fileExtension;
            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('products')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Sản phẩm đã được cập nhật');
            return Redirect::to('all-product');
        }
        DB::table('products')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Sản phẩm đã được cập nhật');
        return Redirect::to('all-product');
    }

    //xử lý chức năng xóa
    public function delete_product($product_id) {
        $this->AuthLogin();
        DB::table('products')->where('product_id', $product_id)->delete();
        Session::put('message', 'Sản phẩm đã bị xóa');
        return Redirect::to('all-product');
    }
}
