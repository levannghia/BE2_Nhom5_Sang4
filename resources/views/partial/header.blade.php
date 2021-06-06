 
<!--pos page start-->
<div class="pos_page">
    <div class="container">
        <!--pos page inner-->
        <div class="pos_page_inner">  
            <!--header area -->
            <div class="header_area">
                <!--header top--> 
                <div class="header_top">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="switcher">
                                <ul>
                                    @if (Auth::check())
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Hello: {{ Auth::user()->name }}
                                       </button>
                                       <div class="dropdown-menu">
                                         <a class="dropdown-item" href="{{ route('profile') }}">My profile</a>
                                         <a class="dropdown-item" href="{{ route('changepassword') }}">Change password</a>
                                       <form action="{{ route('delete-account') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                                           @csrf
                                           <button type="submit" name="deleteAccount" class="btn btn-danger">Delete the account</button>
                                       </form>
                                       </div>
                                     </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header_links">
                                <ul>
                                    <li><a href="{{ route('profile') }}" title="My account">My account</a></li>
                                    <li><a href="{{asset('/cart')}}" title="My cart">My cart</a></li>
                                    @if (Auth::check())
                                         <li><a href="{{ route('logout') }}" title="Login">Logout</a></li>

                                     @else
                                         <li><a href="{{ url('login') }}" title="Login">Login</a></li>
                                     @endif
                                </ul>
                            </div>   
                        </div>
                    </div> 
                </div> 
                <!--header top end-->

                <!--header middel--> 
                <div class="header_middel">
                    <div class="row align-items-center">
                        <!--logo start-->
                        <div class="col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('img\logo\logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <!--logo end-->
                        <div class="col-lg-9 col-md-9">
                            <div class="header_right_info">
                                <div class="search_bar">
                                    <form action="#">
                                        <input placeholder="Search..." type="text">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>    
                <!--header middel end-->      
    <div class="header_bottom">
        <div class="row">
                <div class="col-12">
                    <div class="main_menu_inner">
                        <div class="main_menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{URL::to('/')}}">trang chủ</a></li>
                                    <li><a href="{{url('product')}}">tất cả sản phẩm</a>
                                        {{-- <div class="mega_menu jewelry">
                                            <div class="mega_items jewelry">
                                                <ul>
                                                    <li><a href="shop-list.html">shop list</a></li>
                                                </ul>
                                            </div>
                                        </div>   --}}
                                    </li>
                                    <li><a href="#">tin tức</a></li>
                                    <li><a href="{{asset('/cart')}}">Giỏ hàng</a></li>
                                    <li><a href="#">Liên hệ</a></li>   
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu d-lg-none">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{URL::to('/trang-chu')}}">trang chủ</a></li>
                                    <li><a href="shop.html">sản phẩm mới</a>
                                        <div class="mega_menu jewelry">
                                            <div class="mega_items jewelry">
                                                <ul>
                                                    <li><a href="shop-list.html">shop list</a></li>
                                                </ul>
                                            </div>
                                        </div>  
                                    </li>
                                    <li><a href="#">tin tức</a></li>
                                    <li><a href="#">Giỏ hàng</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!--header end -->
