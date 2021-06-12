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
                                          Xin chào: {{ Auth::user()->name }}
                                       </button>
                                       <div class="dropdown-menu">
                                         <a class="dropdown-item" href="{{ route('profile') }}">Tài khoản của bạn</a>
                                         <a class="dropdown-item" href="{{ route('changepassword') }}">Thay đổi mật khẩu</a>
                                       <form action="{{ route('delete-account') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                                           @csrf
                                           <button type="submit" name="deleteAccount" class="btn btn-danger">Xóa tài khoản</button>
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
                                    <li><a href="{{ route('profile') }}" title="My account">Tài khoản của bạn</a></li>
                                    <li><a href="{{asset('/cart')}}" title="My cart">Giỏ hàng</a></li>
                                    @if (Auth::check())
                                         <li><a href="{{ route('logout') }}" title="Login">Đăng xuất</a></li>
                                     @else
                                         <li><a href="{{ url('login') }}" title="Login">Đăng nhập</a></li>
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
                                <a href="{{URL::to('/')}}"><img src="{{asset('img\logo\logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <!--logo end-->
                        <div class="col-lg-9 col-md-9">
                            <div class="header_right_info">
                                <div class="search_bar">
                                    <form action="{{ asset('/search') }}" method="POST">
                                        @csrf
                                        <input name="search_keyword" placeholder="Tìm kiếm" type="text">
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
                                    <li><a href="{{asset('/show-all-product')}}">tất cả sản phẩm</a></li>
                                    <li><a href="{{asset('/cart')}}">Giỏ hàng</a></li>
                                    <li><a href="{{asset('/lien-he')}}">Liên hệ</a></li>   
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu d-lg-none">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{URL::to('/')}}">trang chủ</a></li>
                                    <li><a href="{{asset('/show-all-product')}}">tất cả sản phẩm</a></li>
                                    <li><a href="{{asset('/cart')}}">Giỏ hàng</a></li>
                                    <li><a href="{{asset('/lien-he')}}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!--header end -->
