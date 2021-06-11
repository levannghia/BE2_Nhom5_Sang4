@section('title')
    Home
@endsection
@section('content')
@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $n = 5;      
@endphp
    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-8 col-12">
                <!--sidebar banner-->
                <!--sidebar banner end-->

                <!--categorie menu start-->
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
                        <a href="#"><img src="{{ asset('img\banner\banner12a.jpg') }}" alt=""></a>
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
                                    <h1>Rau sạch 4K</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url({{ asset('img/slider/slider_2.png') }})">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>New Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url({{ asset('img/slider/slider_3.png') }})">
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
                        <h3>Sản phẩm mới nhất</h3>
                    </div>

                    <div class="row">
                        <div class="product_active owl-carousel">
                            @foreach ($all_product as $product)
                                <?php $photos = explode(',', $product->product_image); ?>
                                <div class="col-lg-3">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}"><img
                                                    src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                                    @if ($now->diffInDays($product->created_at) >= $n)
                                                    <div class="img_icone">
                                                        <img src="{{ asset('img\cart\sale-30.png') }}" alt="">
                                                    </div>
                                                    @else
                                                    <div class="img_icone">
                                                        <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                                                    </div>
                                                    @endif
                                            

                                        </div>
                                        <div class="product_content">
                                            @if ($now->diffInDays($product->created_at) >= $n)
                                            <span class="product_price">{{ number_format($product->product_price - ($product->product_price*30/100)) }}
                                                đ</span>
                                            @else
                                            <span class="product_price">{{ number_format($product->product_price) }}
                                                đ</span>
                                            @endif
                                            <h3 class="product_title"><a
                                                    href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}">{{ $product->product_name }}</a>
                                            </h3>
                                        </div>
                                        <div class="product_info">
                                            <ul>
                                                <li><a href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}"
                                                        title="Quick view">Xem chi tiết</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="new_product_area">
                    <div class="block_title">
                        <h3>Sản phẩm nỗi bậc</h3>
                    </div>

                    <div class="row">

                        <div class="product_active owl-carousel">
                            @foreach ($product_view as $product)
                                <?php $photos = explode(',', $product->product_image); ?>
                                <div class="col-lg-3">
                                    <div class="single_product">

                                        <div class="product_thumb">
                                            <a href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}"><img
                                                    src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                                    @if ($now->diffInDays($product->created_at) >= $n)
                                                    <div class="img_icone">
                                                        <img src="{{ asset('img\cart\sale-30.png') }}" alt="">
                                                    </div>
                                                    @else
                                                    <div class="img_icone">
                                                        <img src="{{ asset('img\cart\span-hot.png') }}" alt="">
                                                    </div>
                                                    @endif

                                        </div>
                                        <div class="product_content">
                                            @if ($now->diffInDays($product->created_at) >= $n)
                                            <span class="product_price">{{ number_format($product->product_price - ($product->product_price*30/100)) }}
                                                đ</span>
                                            @else
                                            <span class="product_price">{{ number_format($product->product_price) }}
                                                đ</span>
                                            @endif
                                            
                                            <h3 class="product_title"><a
                                                    href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}">{{ $product->product_name }}</a>
                                            </h3>
                                        </div>
                                        <div class="product_info">
                                            <ul>
                                                <li><a href="{{ asset('/chi-tiet-san-pham/id=' . $product->product_id) }}"
                                                        title="Quick view">Xem chi tiết</a></li>
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
        </div>
    </div>
    <!--pos home section end-->
@endsection
@include('layouts.master')
