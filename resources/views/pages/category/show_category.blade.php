@section('content')
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
                <h4 class=""><a href="{{URL::to('/danh-muc-san-pham/cate='.$cate->category_id)}}">{{ $cate->category_name }}</a></h4>
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
                    @foreach ($cate_name as $name)
                    <h3>{{ $name->category_name }}</h3>
                    @endforeach
                </div>
                
                <div class="row">
                
                <div class="product_active owl-carousel">
                    @foreach ($category_by_id as $procateid)
                    <div class="col-lg-3">
                        <div class="single_product">
                            
                            <div class="product_thumb">
                               <a href="{{asset('/chi-tiet-san-pham/id='.$procateid->product_id)}}"><img src="{{asset('upload/product/'.$procateid->product_image)}}" alt=""></a> 
                               <div class="img_icone">
                                   <img src="{{asset('img\cart\span-new.png')}}" alt="">
                               </div>
                               <div class="product_action">
                                   <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                               </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{ number_format($procateid->product_price) }} đ</span>
                                <h3 class="product_title"><a href="single-product.html">{{ $procateid->product_name }}</a></h3>
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
            <!--new product area start-->  
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
@include('layouts.master')
