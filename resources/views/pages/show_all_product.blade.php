<<<<<<< HEAD
﻿@section('content')
<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-8 col-12">
           <!--sidebar banner-->
            <!--sidebar banner end-->

            <!--categorie menu start-->
            <div class="sidebar_widget catrgorie mb-35">
                <h3>Danh mục sản phẩm</h3>
                @foreach ($all_category as $category)
                <h4 class=""><a href="{{url('/danh-muc-san-pham/category_id='.$category->category_id)}}">{{ $category->category_name }}</a></h4>
                @endforeach
            </div>
            <!--categorie menu end-->

            <!--sidebar banner-->
            <div class="sidebar_widget bottom ">
                <div class="banner_img">
                    <a href="#"><img src="{{asset('img\banner\banner12.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--sidebar banner end-->



        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider slider_1">
                <div class="slider_active owl-carousel">
                    <div class="single_slider" style="background-image: url({{asset('img/slider/slide_56.jpg')}})">
                        <div class="slider_content">
                            <div class="slider_content_inner">  
                                <h1>Rau sạch 4K</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                            </div>     
                        </div>    
                    </div>
                    <div class="single_slider" style="background-image: url({{asset('img/slider/slider_2.png')}})">
                        <div class="slider_content">
                            <div class="slider_content_inner">  
                                <h1>New Collection</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a href="#">shop now</a>
                            </div>         
                        </div>         
                    </div>
                    <div class="single_slider" style="background-image: url({{asset('img/slider/slider_3.png')}})">
                        <div class="slider_content">  
                            <div class="slider_content_inner">  
                                <h1>Best Collection</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                <a href="#">shop now</a>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div> 
            <!--banner slider start-->

            <!--new product area start-->
            <div class="new_product_area">
                <div class="block_title">
                    <h3>Tất cả sản phẩm</h3>
                </div>
                
                <div class="row">
                
                    @foreach ($all_product as $product)
                    <div class="col-lg-3">
                        <div class="single_product">
                            
                            <div class="product_thumb">
                               <a href="single-product.html"><img src="{{asset('img/product/'.$product->product_image)}}" alt=""></a> 
                               <div class="img_icone">
                                   <img src="{{asset('img\cart\span-new.png')}}" alt="">
                               </div>
                               <div class="product_action">
                                   <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                               </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ number_format($product->product_price) }} đ</span>
                                <h3 class="product_title"><a href="single-product.html">{{ $product->product_name }}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="#" title=" Add to Wishlist ">Thêm vào giỏ hàng</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                   
                </div>           
            </div> 
            
        </div>
    </div>  
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
=======
@section('title')
    Tất cả sản phẩm
@endsection
@section('content')
    @php
    use Carbon\Carbon;
    $now = Carbon::now();
    $n = 5;
    @endphp
    <style>
        .product_ratting .active {
            color: #00BBA6 !important;
        }

    </style>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>tất cả sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-12">
                <!--layere categorie"-->
                <div class="sidebar_widget catrgorie mb-35">
                    <h3>Danh mục sản phẩm</h3>
                    @foreach ($category as $cate)
                        <h4 class=""><a
                                href="{{ URL::to('/danh-muc-san-pham/cate=' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                        </h4>
                    @endforeach

                </div>
                <!--categorie menu end-->

                <!--sidebar banner-->
                <div class="sidebar_widget bottom ">
                    <div class="banner_img">
                        <a href="#"><img src="{{ asset('img\banner\giao-hang.jpg') }}" alt=""></a>
                    </div>
                </div>
                <br>
                <div class="sidebar_widget bottom ">
                    <div class="banner_img">
                        <a href="#"><img src="{{ asset('img\banner\banner12a.jpg') }}" alt=""></a>
                    </div>
                </div>
                <br>
                <div class="sidebar_widget bottom ">
                    <div class="banner_img">
                        <a href="#"><img src="{{ asset('img\banner\tetdoanngo.jpg') }}" alt=""></a>
                    </div>
                </div>
                <!--sidebar banner end-->

            </div>
            <div class="col-lg-9 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider slider_1">
                    <div class="slider_active owl-carousel">
                        <div class="single_slider" style="background-image: url({{ asset('img/slider/slide_56.jpg') }})">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url({{ asset('img/slider/covid.jpg') }})">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url({{ asset('img/slider/rau4k.jpg') }})">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>Rau sạch 4K</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--banner slider start-->

                <!--shop toolbar start-->
                <div class="shop_toolbar mb-35">

                    <div class="list_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large"
                                    aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i
                                        class="fa fa-th-list"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="select_option">
                        <form id="form_short" method="GET">
                            {{-- @csrf --}}
                            <label>Sắp xếp theo</label>
                            <select name="orderby" id="short" class="short">
                                <option selected="" value="1">mặc định</option>
                                <option value="price_max">Giá tăng dần</option>
                                <option value="price_min">Giá giảm dần</option>
                                <option value="price_name">Tên sản phẩm</option>
                                <option value="desc">Sản phẩm mới</option>
                                <option value="rating_min">Đánh giá giảm dần</option>
                                <option value="rating_max">Đánh giá tăng dần</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!--shop toolbar end-->

                <!--shop tab product-->
                <div class="shop_tab_product">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="large" role="tabpanel">
                            <div class="row">
                                @foreach ($products as $item)
                                    <?php $photos = explode(',', $item->product_image); ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a href="{{ url('/chi-tiet-san-pham/id=' . $item->product_id) }}"><img
                                                        src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                                <div class="img_icone">
                                                    @if ($now->diffInDays($item->created_at) >= $n)
                                                        <img src="{{ asset('\img\cart\sale-30.png') }}" alt="">
                                                    @elseif ($item->product_rating >= 4)
                                                        <img src="{{ asset('\img\cart\span-hot.png') }}" alt="">
                                                    @elseif ($now->diffInDays($item->created_at) < $n) <img
                                                            src="{{ asset('\img\cart\span-new.png') }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product_content">
                                                @if ($now->diffInDays($item->created_at) >= $n)
                                                    <span
                                                        class="product_price">{{ number_format($item->product_price - ($item->product_price * 30) / 100) }}
                                                        VNĐ</span>
                                                @else
                                                    <span class="product_price">{{ number_format($item->product_price) }}
                                                        VNĐ</span>
                                                @endif

                                                <h3 class="product_title"><a
                                                        href="{{ url('/chi-tiet-san-pham/id=' . $item->product_id) }}">{{ $item->product_name }}</a>
                                                </h3>
                                            </div>
                                            <div class="product_info">
                                                <ul>
                                                    <li><a href="{{ url('/chi-tiet-san-pham/id=' . $item->product_id) }}"
                                                            title="Quick view">View Detail</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel">
                            @foreach ($products as $item)
                                <?php $photos = explode(',', $item->product_image); ?>
                                <div class="product_list_item mb-35">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product_thumb">
                                                <a href="{{ url('/chi-tiet-san-pham/id=' . $item->product_id) }}"><img
                                                        src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                                <div class="hot_img">
                                                    @if ($now->diffInDays($item->created_at) >= $n)
                                                        <img src="{{ asset('\img\cart\sale-30.png') }}" alt="">
                                                    @elseif ($item->product_rating >= 4)
                                                        <img src="{{ asset('\img\cart\span-hot.png') }}" alt="">
                                                    @elseif ($now->diffInDays($item->created_at) < $n) <img
                                                            src="{{ asset('\img\cart\span-new.png') }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6">
                                            <div class="list_product_content">
                                                <div class="product_ratting">
                                                    <ul>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <li><a href="#"><i
                                                                        class="fa fa-star {{ $i <= $item->product_rating ? 'active' : '' }}"
                                                                        style="color: #999;"></i></a></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                                <div class="list_title">
                                                    <h3><a
                                                            href="{{ url('/chi-tiet-san-pham/id=' . $item->product_id) }}">{{ $item->product_name }}</a>
                                                    </h3>
                                                </div>
                                                <p class="design">{{ $item->product_description }}</p>
                                                <div class="content_price">
                                                    @if ($now->diffInDays($item->created_at) >= $n)
                                                        <span
                                                            class="product_price">{{ number_format($item->product_price - ($item->product_price * 30) / 100) }}
                                                            VNĐ</span>
                                                        <span class="old-price">{{ number_format($item->product_price) }}
                                                            VNĐ</span>
                                                    @else
                                                        <span
                                                            class="product_price">{{ number_format($item->product_price) }}
                                                            VNĐ</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!--shop tab product end-->

                <!--pagination style start-->
                <div class="pagination_style">
                    <div class="page_number">
                        <span>Pages: </span>
                        <ul>
                            <li>{{ $products->links() }}</li>
                        </ul>
                    </div>
                </div>
                <!--pagination style end-->
            </div>
        </div>
    </div>
    <!--pos home section end-->
    </div>
    <!--pos page inner end-->
    </div>
    </div>
    <!--pos page end-->
@endsection
@section('script')
    <script>
        $(function() {
            $('.short').change(function() {
                $("#form_short").submit()
            })
        })

    </script>
>>>>>>> ThanhPhat2
@endsection
@include('layouts.master')
