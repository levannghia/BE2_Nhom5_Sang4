@section('title')
    Chi tiết sản phẩm
@endsection
@section('content')
@php
    use Carbon\Carbon;
    $now = Carbon::now(); 
    $n = 5;         
@endphp
    <style>
        .list_star i:hover {
            cursor: pointer;
        }

        .product_ratting .active {
            color: #00BBA6 !important;
        }

        .list_text {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: boder-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }

        .list_text:after {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82, 184, 88, 0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }

        .list_star .rating_active {
            color: #00BBA6;
        }

    </style>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ asset('/') }}">trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Chi tiết sản phẩm</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product wrapper start-->
    <div class="product_details">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
        @if (Session::has('thatbai'))
        <div class="alert alert-danger">{{Session::get('thatbai')}}</div>
        @elseif (Session::has('thanhcong'))
            <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
        @endif
        @foreach ($product_details as $pro_detail)
        <?php $photos = explode(',',$pro_detail->product_image);?>

            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="product_tab fix">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                        aria-selected="false"><img
                                            src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2"
                                        aria-selected="false"><img
                                            src="{{ asset('upload/product/' . $photos[1]) }}" alt=""></a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3"
                                        aria-selected="false"><img
                                            src="{{ asset('upload/product/' . $photos[2]) }}" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content produc_tab_c">
                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="{{ asset('upload/product/' . $photos[0]) }}"
                                            alt=""></a>
                                    
                                    <div class="view_img">
                                        <a class="large_view"
                                            href="{{ asset('upload/product/' . $photos[0]) }}"><i
                                                class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="{{ asset('upload/product/' . $photos[1]) }}"
                                            alt=""></a>
                                    
                                    <div class="view_img">
                                        <a class="large_view"
                                            href="{{ asset('upload/product/' . $photos[1]) }}"><i
                                                class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="{{ asset('upload/product/' . $photos[2]) }}"
                                            alt=""></a>
                                   
                                    <div class="view_img">
                                        <a class="large_view"
                                            href="{{ asset('upload/product/' . $photos[2]) }}">
                                            <i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="product_d_right">
                        <h1>{{ $pro_detail->product_name }}</h1>
                        <div class="product_ratting mb-10">
                            <ul>
                                @if (isset($pro_detail->product_rating))
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li><a href="#"><i
                                                    class="fa fa-star {{ $i <= $pro_detail->product_rating ? 'active' : '' }}"
                                                    style="color: #999;"></i></a></li>
                                    @endfor
                                @endif
                                <li><i class="fa fa-eye" aria-hidden="true"> Lượt xem: {{ $pro_detail->product_view }}</i></li>
                            </ul>
                        </div>
                        <div class="product_desc">
                            <p>{{ $pro_detail->product_description }}</p>
                        </div>
                        <div class="content_price mb-15">
                            
                            @if ($now->diffInDays($pro_detail->created_at) >= $n)
                            
                            <span class="product_price">{{ number_format($pro_detail->product_price - ($pro_detail->product_price * 50/100)) }} VNĐ</span>
                            <span class="old-price">{{ number_format($pro_detail->product_price) }} VNĐ</span>
                            @else
                            <span class="product_price">{{ number_format($pro_detail->product_price) }} VNĐ</span>
                            @endif
                            
                            {{-- <span class="old-price">{{ number_format($pro_detail->product_price) }}VNĐ</span> --}}
                        </div>
                        <div class="box_quantity mb-20">
                            <form action="{{ asset('/save-cart') }}" method="post">
                                {{ csrf_field() }}
                                <label>Số lượng</label>
                                <input name="qty" min="0" max="100" value="1" type="number">
                                <input name="productid_hidden" value="{{ $pro_detail->product_id }}" type="hidden">
                                <button type="submit"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                            </form>

                        </div>

                        <div class="product_stock mb-20">
                            <label>Tình trạng</label>
                            @if ($pro_detail->product_quantity>0)
                            <span> Còn hàng </span>
                            @else
                            <span> Hết hàng </span>
                            @endif
                            
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
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Chi tiết sản phẩm</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#comments" role="tab" aria-controls="conmments"
                                    aria-selected="false">Bình luận</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Đánh giá</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p>{{ $pro_detail->product_content }}</p>
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
                                <form action="{{ asset('/comment/id=' . $pro_detail->product_id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <h2>Add a comment </h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Để lại bình luận của bạn về sản phẩm này </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        @if (Auth::check())
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Họ tên</label>
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
                                                <label for="author">Họ tên</label>
                                                <input id="author" name="name" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" name="email" type="email">
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit">đăng</button>
                                </form>
                            </div>


                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">

                            @if (isset($reviews))
                                @foreach ($reviews as $review)
                                    <div class="product_info_inner">
                                        <div class="product_ratting mb-10">
                                            <ul>
                                                @if ($review->rating)
                                                    @php
                                                        $ra = $review->rating;
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li><a href="#"><i
                                                                    class="fa fa-star {{ $i <= $ra ? 'active' : '' }}"
                                                                    style="color: #999;"></i></a></li>
                                                    @endfor
                                                @endif
                                            </ul>
                                            <strong>{{ isset($review->user->name) ? $review->user->name : '[N\A]' }}</strong>
                                            <p>{{ $review->created_at }}</p>
                                        </div>
                                        <div class="product_demo">
                                            @if ($ra == 1)
                                                <strong style="color: #222222">Không thích</strong>
                                            @elseif ($ra == 2)
                                                <strong style="color: #00CC00">Tạm được</strong>
                                            @elseif ($ra == 3)
                                                <strong style="color: #0033FF">Bình thường</strong>
                                            @elseif ($ra == 4)
                                                <strong style="color: #FFCC00">Rất tốt</strong>
                                            @else
                                                <strong style="color: #CC0000">Tuyệt vời</strong>
                                            @endif

                                            <p>{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <li>{{ $reviews->links() }}</li>
                            {{-- @elseif (!isset($reviews))
                                <p>Sản phẩm chưa có lượt đánh giá nào</p> --}}
                            @endif

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
                    <h3> Sản phẩm liên quan</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                @foreach ($relate_product as $relate_pro)
                <?php $photos = explode(',',$relate_pro->product_image);?>
                    <div class="col-lg-3">

                        <div class="single_product">

                            <div class="product_thumb">
                                <a href="{{ asset('/chi-tiet-san-pham/id=' . $relate_pro->product_id) }}"><img
                                        src="{{ asset('upload/product/' . $photos[0]) }}" alt=""></a>
                                <div class="img_icone">
                                    @if ($now->diffInDays($relate_pro->created_at) >= $n)
                                    <img src="{{ asset('\img\cart\sale-30.png') }}" alt="">
                                    @elseif ($relate_pro->product_rating >= 4)
                                    <img src="{{ asset('\img\cart\span-hot.png') }}" alt="">
                                    @elseif ($now->diffInDays($relate_pro->created_at) < $n)
                                    <img src="{{ asset('\img\cart\span-new.png') }}" alt="">
                                    @endif            
                                </div>
                            
                            </div>
                            <div class="product_content">
                                @if ($now->diffInDays($relate_pro->created_at) >= $n)
                                <span class="product_price">{{ number_format($relate_pro->product_price - ($relate_pro->product_price *50/100)) }}</span>
                                @else
                                <span class="product_price">{{ number_format($relate_pro->product_price) }} VNĐ</span>
                                @endif
                                
                                <h3 class="product_title"><a
                                        href="{{ asset('/chi-tiet-san-pham/id=' . $relate_pro->product_id) }}">{{ $relate_pro->product_name }}</a>
                                </h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="{{ asset('/chi-tiet-san-pham/id=' . $relate_pro->product_id) }}"
                                            title="Quick view">Xem
                                            chi tiết</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--new product area start-->

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.getElementById("btn1").onclick = function() {
            document.getElementById("danhgia").style.display = 'none';
        };

        $(function() {
            let listStar = $(".list_star .fa");

            listRatingText = {
                1: "Không thích",
                2: "Tạm được",
                3: "Bình thường",
                4: "Rất tốt",
                5: "Tuyệt vời",
            }

            listStar.mouseover(function() {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStar.removeClass('rating_active');
                $(".number_rating").val(number);
                $.each(listStar, function(key, value) {
                    if (key + 1 <= number)
                        $(this).addClass('rating_active');
                });

                $(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();
            });

            $(".js_review_product").click(function(e) {
                event.preventDefault();
                let content = $("#review_comment").val();
                let number = $(".number_rating").val()
                console.log(content, number);


            });
        });

    </script>
@endsection
@endsection
@include('layouts.master')
