@extends('layouts/master')

@section('title') 
    Product
@endsection

@section('content')
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>single product</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
@if (Session::has('message')) 
<div class="mt-2 mb-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <a class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
</div>
@endif
<!--product wrapper start-->
<div class="product_details">
    <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix"> 
                    <div class="product_tab_button">    
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="img\cart\cart.jpg" alt=""></a>
                            </li>
                            <li>
                                    <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="img\cart\cart2.jpg" alt=""></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="img\cart\cart4.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div> 
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="img\product\product13.jpg" alt=""></a>
                                <div class="img_icone">
                                    <img src="img\cart\span-new.png" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="img\product\product13.jpg"><i class="fa fa-search-plus"></i></a>
                                </div>    
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="img\product\product14.jpg" alt=""></a>
                                <div class="img_icone">
                                    <img src="img\cart\span-new.png" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="img\product\product14.jpg"><i class="fa fa-search-plus"></i></a>
                                </div>     
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="img\product\product15.jpg" alt=""></a>
                                <div class="img_icone">
                                    <img src="img\cart\span-new.png" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="img\product\product15.jpg"> <i class="fa fa-search-plus"></i></a>
                                </div>     
                            </div>
                        </div>
                    </div>

                </div> 
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>{{ $products->product_name }}</h1>
                        <div class="product_ratting mb-10">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"> Write a review </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>{{ $products->product_description }}</p>
                    </div>

                    <div class="content_price mb-15">
                        <span>${{ number_format($products->product_price) }}</span>
                        <span class="old-price"></span>
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="cart.html" method="post">
                            @csrf
                            <label>quantity</label>
                            <input min="0" max="100" value="1" type="number" name="quantity">
                            <input type="text" name="product_id" value="{{ $products->product_id }}" hidden>
                            <button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>   
                        </form> 
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
                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                        </li>
                        <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>    
                    </div>

                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                        <div class="product_d_table">
                            <form action="#">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                        <div class="product_info_inner">
                            <div class="product_ratting mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <strong>Posthemes</strong> 
                                <p>09/07/2018</p>
                            </div>
                            <div class="product_demo">
                                <strong>demo</strong>
                                <p>That's OK!</p>
                            </div>
                        </div> 
                        <div class="product_review_form">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                        @break
                                    @endforeach
                                    <a class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                            @endif
                            <form action="review.html" method="post">
                                @csrf
                                <h2>start</h2>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="product_ratting mb-10" id="review-start-product">
                                            <ul>
                                                <li><a data-num="0" href="javascript:;"><i class="fa fa-star"></i></a></li>
                                                <li><a data-num="1" href="javascript:;"><i class="fa fa-star"></i></a></li>
                                                <li><a data-num="2" href="javascript:;"><i class="fa fa-star"></i></a></li>
                                                <li><a data-num="3" href="javascript:;"><i class="fa fa-star"></i></a></li>
                                                <li><a data-num="4" href="javascript:;"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>   
                                    </div>   
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Your review </label>
                                        <textarea name="comment" id="review_comment"></textarea>
                                    </div>   
                                </div>
                                <input type="text" name="rating" value="5" hidden>
                                <input type="text" name="product_id" value="{{ $products->product_id }}" hidden>
                                <button type="submit">Submit</button>
                            </form>   
                        </div>     
                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>  
<!--product info end-->
@endsection

@section('javascript')
    <script>
        $('#review-start-product ul li a').on('click', function () {
            let limStart = $(this).data("num");
            let start = $('#review-start-product ul li a i');
            start.each(function(i, el) {
                let colorCode = i <= limStart ? '#00bba6' : '#333';
                $(el).css("color", colorCode);
            });
            $('input[name="rating"]').val(++limStart);
        });
    </script>
@endsection