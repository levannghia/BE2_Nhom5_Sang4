<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Category;
session_start();

class AdminCategoryController extends Controller
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

    //hiển thị trang thêm danh mục
    public function add_category_product() {
        $this->AuthLogin();
        return view('admin.category.add_category_product');
    }

    //liệt kê danh mục
    public function all_category_product() {
        $this->AuthLogin();
        $category = DB::table('categories')->paginate(20);
        $all_category = view('admin.category.all_category_product', ['category' => $category]);
        return view('admin_layout', ['admin.category.all_category_product' => $all_category]);
    }

    //chỉnh sửa danh mục
    public function edit_category_product($category_id) {
        $this->AuthLogin();
        $category = DB::table('categories')->where('category_id', $category_id)->get();
        $edit_category = view('admin.category.edit_category_product', ['category' => $category]);
        return view('admin_layout', ['admin.category.edit_category_product' => $edit_category]);
    }

    //cập nhật trạng thái danh mục
    //ẩn danh mục
    public function active_category_product($category_id) {
        $this->AuthLogin();
        DB::table('categories')->where('category_id', $category_id)->update(['category_status'=>'Hiện']);
        Session::put('message', 'Danh mục đã hiện');
        return Redirect::to('all-category-product');
    }
    //hiện danh mục
    public function unactive_category_product($category_id) {
        $this->AuthLogin();
        DB::table('categories')->where('category_id', $category_id)->update(['category_status'=>'Ẩn']);
        Session::put('message', 'Danh mục đã ẩn');
        return Redirect::to('all-category-product');
    }

    ///Các hàm xử lý
    //xử lý thêm danh mục
    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name']= $request->category_name;
        $data['category_description']= $request->category_desc;
        $data['category_status']= $request->category_status;

        DB::table('categories')->insert($data);
        Session::put('message', 'Thêm danh mục thành công');
        return Redirect::to('add-category-product');
    }

    //xử lý chức năng sửa
    public function update_category_product(Request $request, $category_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name']= $request->category_name;
        $data['category_description']= $request->category_desc;

        DB::table('categories')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Chỉnh sửa danh mục thành công');
        return Redirect::to('all-category-product');
    }

    //xử lý chức năng sửa
    public function delete_category_product($category_id) {
        $this->AuthLogin();
        DB::table('categories')->where('category_id', $category_id)->delete();
        Session::put('message', 'Đã xóa danh mục');
        return Redirect::to('all-category-product');
    }

    //end function Admin page

    //start function Home page
    public function show_category_home($category_id) {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $category_by_id = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('products.category_id', $category_id)->get();
        $cate_name = DB::table('categories')->where('category_id', $category_id)->get();
        return view('pages.category.show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('cate_name', $cate_name);
    }
}
