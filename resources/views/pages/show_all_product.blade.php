@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{asset('/')}}">trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>tất cả sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section shop_section shop_fullwidth">
    <div class="row">
        <div class="col-12">
            <!--banner slider start-->
            <div class="banner_slider fullwidht  mb-35">
                <img src="assets\img\banner\bannner10.jpg" alt="">
            </div> 
            <!--banner slider start-->
        </div>
    </div>       
    <div class="row">
        <div class="col-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">
                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="page_amount">
                    <p>Showing 1–9 of 21 results</p>
                </div> --}}
                <div class="select_option">
                    <form action="#">
                        <label>Sort By</label>
                        <select name="orderby" id="short">
                            <option selected="" value="1">Position</option>
                            <option value="1">Price: Lowest</option>
                            <option value="1">Price: Highest</option>
                            <option value="1">Product Name:Z</option>
                            <option value="1">Sort by price:low</option>
                            <option value="1">Product Name: Z</option>
                            <option value="1">In stock</option>
                            <option value="1">Product Name: A</option>
                            <option value="1">In stock</option>
                        </select>
                    </form>
                </div>
            </div>
            <!--shop toolbar end-->
        </div>
    </div>        

    <!--shop tab product-->
    <div class="shop_tab_product shop_fullwidth">   
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="large" role="tabpanel">
                <div class="row">
                    @foreach ($all_product as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single_product">
                            <div class="product_thumb">
                               <a href="{{asset('/chi-tiet-san-pham/id='.$product->product_id)}}"><img src="{{asset('upload/product/'.$product->product_image)}}" alt=""></a> 
                               <div class="img_icone">
                                   <img src="assets\img\cart\span-new.png" alt="">
                               </div>
                               
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ $product->product_price }}</span>
                                <h3 class="product_title"><a href="{{asset('/chi-tiet-san-pham/id='.$product->product_id)}}">{{ $product->product_name }}</a></h3>
                            </div>
                            <div class="product_info">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>  
                <div class="pages" style="float: right">
                    {{$all_product->links()}}
                </div>
                
            </div>
            
            <div class="tab-pane fade" id="list" role="tabpanel">
                @foreach ($all_product as $product)
                <div class="product_list_item mb-35">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-5 col-sm-6">
                            <div class="product_thumb">
                               <a href="{{asset('/chi-tiet-san-pham/id='.$product->product_id)}}"><img src="{{asset('upload/product/'.$product->product_image)}}" alt=""></a> 
                               <div class="hot_img">
                                   <img src="assets\img\cart\span-hot.png" alt="">
                               </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-6">
                            <div class="list_product_content">
                               <div class="product_ratting">
                                   <ul>
                                        @if (isset($product->product_rating))
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li><a href="#"><i
                                                class="fa fa-star {{ $i <= $product->product_rating ? 'active' : '' }}"
                                                style="color: #999;"></i></a></li>
                                            @endfor
                                        @endif
                                        <li><i class="fa fa-eye" aria-hidden="true"> View: {{ $product->product_view }}</i></li>
                                   </ul>
                               </div>
                                <div class="list_title">
                                    <h3><a href="{{asset('/chi-tiet-san-pham/id='.$product->product_id)}}">{{ $product->product_name }}</a></h3>
                                </div>
                                <p class="design"> {{ $product->product_description }}</p>
                                <div class="content_price">
                                    <span>{{ $product->product_price }}</span>
                                    {{-- <span class="old-price"></span> --}}
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                @endforeach 
                <div class="pages" style="float: right">
                    {{$all_product->links()}}
                </div>                        
            </div>
            
        </div>
    </div>    
    <!--shop tab product end-->

    <!--pagination style start--> 
    
    
    {{-- <div class="pagination_style shop_page">
        <div class="page_number">
            <span>Pages: </span>
            <ul>
                
                
            </ul>
        </div>
    </div> --}}
    <!--pagination style end-->   
</div>
<!--pos home section end-->

@endsection
@include('layouts.master')
