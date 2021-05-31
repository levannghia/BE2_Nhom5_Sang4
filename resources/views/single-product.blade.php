@section('title')
    Single Product
@endsection
@section('content')
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
                        <li><a href="index.html">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>single product</li>
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
        @if (Session::has('thanhcong'))
            <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                    aria-selected="false"><img src="{{ asset('img\cart\cart.jpg') }}" alt=""></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2"
                                    aria-selected="false"><img src="{{ asset('img\cart\cart2.jpg') }}" alt=""></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3"
                                    aria-selected="false"><img src="{{ asset('img\cart\cart4.jpg') }}" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset('img\product\product13.jpg') }}" alt=""></a>
                                <div class="img_icone">
                                    <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset('img\product\product13.jpg') }}"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset('img\product\product14.jpg') }}" alt=""></a>
                                <div class="img_icone">
                                    <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset('img\product\product14.jpg') }}"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset('img\product\product15.jpg') }}" alt=""></a>
                                <div class="img_icone">
                                    <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset('img\product\product15.jpg') }}"> <i
                                            class="fa fa-search-plus"></i></a>
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
                            @if (isset($products->product_rating))
                                @for ($i = 1; $i <= 5; $i++)
                                    <li><a href="#"><i
                                                class="fa fa-star {{ $i <= $products->product_rating ? 'active' : '' }}"
                                                style="color: #999;"></i></a></li>
                                @endfor
                            @endif
                            <li><a href="#"> Write a review </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>{{ $products->product_description }}</p>
                    </div>

                    <div class="content_price mb-15">
                        <span>{{ number_format($products->product_price) }}</span>
                        <span class="old-price">$130.00</span>
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="#">
                            <label>quantity</label>
                            <input min="0" max="100" value="1" type="number">
                        </form>
                        <button type="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                    </div>
                    <div class="product_d_size mb-20">
                        <label for="group_1">size</label>
                        <select name="size" id="group_1">
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                        </select>
                    </div>

                    <div class="sidebar_widget color">
                        <h2>Choose Color</h2>
                        <div class="widget_color">
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li> <a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_stock mb-20">
                        <p>299 items</p>
                        <span> In stock </span>
                    </div>
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
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
                                    aria-selected="false">More info</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Comment</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine
                                    designs delivering stylish separates and statement dresses which have since evolved into
                                    a full ready-to-wear collection in which every item is a vital part of a woman's
                                    wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable
                                    signature style. All the beautiful pieces are made in Italy and manufactured with the
                                    greatest attention. Now Fashion extends to a range of accessories including shoes, hats,
                                    belts and more!</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sheet" role="tabpanel">
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
                                <form action="{{ route('save.comment', $products) }}" method="POST">
                                    @csrf
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
                                                <strong>Không thích</strong>
                                            @elseif ($ra == 2)
                                                <strong>Tạm được</strong>
                                            @elseif ($ra == 3)
                                                <strong>Bình thường</strong>
                                            @elseif ($ra == 4)
                                                <strong>Rất tốt</strong>
                                            @else
                                                <strong>Tuyệt vời</strong>
                                            @endif

                                            <p>{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <li>{{ $reviews->links() }}</li>
                            @endif

                            <div class="product_review_form">
                                <form action="{{ route('save.review', $products) }}" method="POST">
                                    @csrf
                                    <h2>Add a review </h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <div style="display; flex; margin-top:15px">
                                                @php
                                                    $listRatingText = [
                                                        1 => 'Không thích',
                                                        2 => 'Tạm được',
                                                        3 => 'Bình thường',
                                                        4 => 'Rất tốt',
                                                        5 => 'Tuyệt vời',
                                                    ];
                                                @endphp
                                                <span style="margin: 0 15px" class="list_star">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fa fa-star" data-key="{{ $i }}"></i>
                                                    @endfor
                                                </span>
                                                @php
                                                    $i = 10;
                                                @endphp
                                                <span class="list_text"></span>
                                                <input type="hidden" name="rating" value="{{ $i }}"
                                                    class="number_rating">
                                            </div>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>

                                    </div>
                                    <button type="submit">submit</button>
                                </form>
                            </div>
                        </div>
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
                    <h3> 11 other products category:</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product1.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$50.00</span>
                            <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product2.jpg') }}" alt=""></a>
                            <div class="hot_img">
                                <img src="{{ asset('img\cart\span-hot.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$40.00</span>
                            <h3 class="product_title"><a href="single-product.html">Quisque ornare dui</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product3.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$60.00</span>
                            <h3 class="product_title"><a href="single-product.html">Sed non turpiss</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product4.jpg') }}" alt=""></a>
                            <div class="hot_img">
                                <img src="{{ asset('img\cart\span-hot.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$65.00</span>
                            <h3 class="product_title"><a href="single-product.html">Duis convallis</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product6.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$50.00</span>
                            <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--new product area start-->


    <!--new product area start-->
    <div class="new_product_area product_page">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> Related Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product6.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$50.00</span>
                            <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product5.jpg') }}" alt=""></a>
                            <div class="hot_img">
                                <img src="{{ asset('img\cart\span-hot.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$40.00</span>
                            <h3 class="product_title"><a href="single-product.html">Quisque ornare dui</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product4.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$60.00</span>
                            <h3 class="product_title"><a href="single-product.html">Sed non turpiss</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product3.jpg') }}" alt=""></a>
                            <div class="hot_img">
                                <img src="{{ asset('img\cart\span-hot.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$65.00</span>
                            <h3 class="product_title"><a href="single-product.html">Duis convallis</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="single-product.html"><img src="{{ asset('img\product\product2.jpg') }}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{ asset('img\cart\span-new.png') }}" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$50.00</span>
                            <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View
                                        Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--new product area start-->

    </div>
    <!--pos page inner end-->
    </div>
    </div>
    <!--pos page end-->
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
