﻿@section('content')
<!--pos page start-->
<div class="pos_page">
    <div class="container">
        <!--pos page inner-->
        <div class="pos_page_inner">
            <!--product wrapper start-->
            <div class="product_details">
                @foreach ($product_details as $pro_detail)
                    
                
                <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product_tab fix"> 
                                <div class="product_tab_button">    
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                        </li>
                                        <li>
                                        <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="tab-content produc_tab_c">
                                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                            <div class="img_icone">
                                            <img src="assets\img\cart\span-new.png" alt="">
                                        </div>
                                            <div class="view_img">
                                                <a class="large_view" href="{{asset('upload/product/'.$pro_detail->product_image)}}"><i class="fa fa-search-plus"></i></a>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                            <div class="img_icone">
                                            <img src="assets\img\cart\span-new.png" alt="">
                                        </div>
                                            <div class="view_img">
                                                <a class="large_view" href="{{asset('upload/product/'.$pro_detail->product_image)}}"><i class="fa fa-search-plus"></i></a>
                                            </div>     
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                                        <div class="modal_img">
                                            <a href="#"><img src="{{asset('upload/product/'.$pro_detail->product_image)}}" alt=""></a>
                                            <div class="img_icone">
                                            <img src="assets\img\cart\span-new.png" alt="">
                                        </div>
                                            <div class="view_img">
                                                <a class="large_view" href="{{asset('upload/product/'.$pro_detail->product_image)}}"> <i class="fa fa-search-plus"></i></a>
                                            </div>     
                                        </div>
                                    </div>
                                </div>

                            </div> 
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <h1>{{$pro_detail->product_name}}</h1>
                                <div class="product_desc">
                                    <p>{{$pro_detail->product_description}}</p>
                                </div>

                                <div class="content_price mb-15">
                                    <span class="product_price">{{ number_format($pro_detail->product_price) }}VNĐ</span>
                                    {{-- <span class="old-price">{{ number_format($pro_detail->product_price) }}VNĐ</span> --}}
                                </div>
                                <div class="box_quantity mb-20">
                                    <form action="{{asset('/save-cart')}}" method="post">
                                        {{ csrf_field() }}
                                        <label>quantity</label>
                                        <input name="qty" min="0" max="100" value="1" type="number">
                                        <input name="productid_hidden" value="{{$pro_detail->product_id}}" type="hidden">
                                        <button type="submit"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                                    </form> 
                                    
                                </div>
                                
                                <div class="product_stock mb-20">
                                    <label>Tình trạng</label>
                                    <span> Còn hàng </span>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <!--product details end-->


            <!--product info start-->
            <div class="product_d_info">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">   
                            <div class="product_info_button">    
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Chi tiết sản phẩm</a>
                                    </li>
                                    <li>
                                    <a data-toggle="tab" href="#comments" role="tab" aria-controls="conmments" aria-selected="false">Bình luận</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>{{$pro_detail->product_content}}</p>
                                    </div>    
                                </div>
                                
                                <div class="tab-pane fade" id="comments" role="tabpanel">
                                    @if (isset($comments))
                                        @foreach ($comments as $comment)
                                            <div class="product_info_inner">
                                                <div class="product_ratting mb-10">
                                                    <strong>{{ $comment->name }}</strong>
                                                    <p>{{ $comment->created_at }}</p>
                                                </div>
                                                <div class="product_demo">
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <li>{{ $comments->links() }}</li>
                                    @endif
                                    <div class="product_d_table product_review_form">
                                        <form action="{{ asset('/comment/id='.$pro_detail->product_id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <h2>Add a comment </h2>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your comment </label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                @if (Auth::check())
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" name="name" type="text"
                                                            value="{{ Auth::user()->name }}">
        
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" name="email" type="email"
                                                            value="{{ Auth::user()->email }}">
                                                    </div>
                                                @else
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" name="name" type="text">
        
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" name="email" type="email">
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="submit">submit</button>
                                        </form>
                                    </div>
        
                                </div>
                                @endforeach
                            </div>
                        </div>     
                    </div>
                </div>
            </div>  
            <!--product info end-->

            <!--new product area start-->
            <div class="new_product_area product_page">
                <div class="row">
                    <div class="col-12">
                        <div class="block_title">
                        <h3>    Sản phẩm liên quan</h3>
                    </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="single_p_active owl-carousel">
                        @foreach ($relate_product as $relate_pro)
                        <div class="col-lg-3">
                
                            <div class="single_product">
                                
                                <div class="product_thumb">
                                    <a href="{{asset('/chi-tiet-san-pham/id='.$relate_pro->product_id)}}"><img src="{{asset('upload/product/'.$relate_pro->product_image)}}" alt=""></a> 
                                    <div class="img_icone">
                                        <img src="assets\img\cart\span-new.png" alt="">
                                    </div>
                                    <div class="product_action">
                                        <a href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                                    </div>
                                    </div>
                                    <div class="product_content">
                                        <span class="product_price">{{ number_format($relate_pro->product_price)}}</span>
                                        <h3 class="product_title"><a href="{{asset('/chi-tiet-san-pham/id='.$relate_pro->product_id)}}">{{ ($relate_pro->product_name)}}</a></h3>
                                    </div>
                                    <div class="product_info">
                                        <ul>
                                            <li><a href="{{asset('/chi-tiet-san-pham/id='.$relate_pro->product_id)}}" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>
                                        </ul>
                                    </div>
                                
                            </div>
                            
                        </div>
                        @endforeach
                    </div> 
                </div>      
            </div> 
            <!--new product area start-->  

        </div>
        <!--pos page inner end-->
    </div>
</div>
<!--pos page end-->
@endsection
@include('layouts.master')