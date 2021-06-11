<?php

namespace App\Http\Controllers;
use DB;
use App\Comment;
use App\Product;
use App\Review;
use App\Category;
use Illuminate\Http\Request;
session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        
        $products = Product::paginate(9);
        if($request->orderby){
            $orderby = $request->orderby;
            switch ($orderby){
                case 'desc':
                    $products = Product::orderby('product_id','DESC')->paginate(6)->appends(request()->query());
                    break;
                case 'price_max':
                    $products = Product::orderby('product_price','ASC')->paginate(6)->appends(request()->query());
                    break;
                case 'price_min':
                    $products = Product::orderby('product_price','DESC')->paginate(6)->appends(request()->query());
                    break;
                case 'rating_min':
                    $products = Product::orderby('product_rating','DESC')->paginate(6)->appends(request()->query());
                     break;
                case 'rating_max':
                    $products = Product::orderby('product_rating','ASC')->paginate(6)->appends(request()->query());
                    break;
                default:
                    $products = Product::orderby('product_name','ASC')->paginate(6)->appends(request()->query());
                    break;

            }
        }
        return view('pages.show_all_product')->with('products',$products)->with('category', $cate_product);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function detail_product($product_id) {

        $cate_product = DB::table('categories')->where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();
        $detail_product = DB::table('products')->where('products.product_id', $product_id)->get();
        $comments = Comment::where('product_id',$product_id)->orderBy('created_at',"DESC")->paginate(4);
        $reviews = Review::with('user:id,name')->where('product_id',$product_id)->orderBy('created_at',"DESC")->paginate(4);
        foreach ($detail_product as $value) {
            $category_id = $value ->category_id;
        }
        $relate_product = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->where('categories.category_id', $category_id)->whereNotIn('products.product_id', [$product_id])->limit(6)->get();
        
        $product = Product::where('product_id',$product_id)->first();
        $product->product_view = $product->product_view + 1;
        $product->save();
        return view('pages.product.detail_product')->with('category', $cate_product)->with('product_details', $detail_product)->with('relate_product', $relate_product)->with('comments', $comments)->with('reviews', $reviews);
    }
    
    public function search(Request $request)
    {
        $keywords = $request->search_keyword;
        $cate_product = Category::where('category_status', 'Hiện')->orderby('category_id', 'desc')->get();

        $search_product = Product::where('product_name', 'like', '%'.$keywords.'%')->paginate(10);
        return view('pages.search.search')->with('category', $cate_product)->with('search_product', $search_product);
    }
}
