@section('content')
            <!--breadcrumbs area start-->
            <div class="breadcrumbs_area">
                <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="{{url('/')}}">trang chủ</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>đăng nhập</li>
                                </ul>

                            </div>
                        </div>
                    </div>
            </div>
            <!--breadcrumbs area end-->

            <!-- customer login start -->
            <div class="customer_login">
                <div class="row">
                            <!--login area start-->
                            <div class="col-lg-6 col-md-6">
                                <div class="account_form">
                                    @if (Session::has('flag'))
                                        <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('message') }}</div>
                                    @endif
                                    <h2>đăng nhập</h2>
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <p>   
                                            <label> Email <span>*</span></label>
                                            <input type="email" name="email">
                                            </p>
                                            <p>   
                                            <label>Mật khẩu <span>*</span></label>
                                            <input type="password" name="password">
                                            </p>   
                                        <div class="login_submit">
                                            <button type="submit">đăng nhập</button>
                                            <label for="remember">
                                                <input id="remember" type="checkbox">
                                                ghi nhớ
                                            </label>
                                            <a href="#">Quên mật khẩu?</a>
                                        </div>
                                    </form>
                                    </div>    
                            </div>
                            <!--login area start-->

                            <!--register area start-->
                            <div class="col-lg-6 col-md-6">
                                <div class="account_form register">
                                    @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $item)
                                                {{$item}}
                                        @endforeach
                                    </div>
                                    @endif
                                    @if(Session::has('thanhcong'))
                                        <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
                                        @endif
                                    <h2>đăng ký</h2>
                                    <form action="{{ route('signup') }}" method="post">
                                        @csrf
                                        <p>   
                                            <label>Tên người dùng <span>*</span></label>
                                            <input type="text" name="name">
                                            </p>
                                            <p>   
                                            <label> Email  <span>*</span></label>
                                            <input type="email" name="email">
                                            </p>
                                            
                                            <p>   
                                            <label>Địa chỉ  <span>*</span></label>
                                            <input type="text" name="address">
                                            </p>
                                            <p>   
                                            <label>Điện thoại <span>*</span></label>
                                            <input type="text" name="phone">
                                            </p>
                                            <p>   
                                            <label>Mật khẩu <span>*</span></label>
                                            <input type="password" pattern="[a-zA-Z0-9!@#$%^&*]{6,}" required="" name="password">
                                            </p>
                                            <p>   
                                            <label>Xác nhận mật khẩu <span>*</span></label>
                                            <input type="password" name="ConfirmPassword">
                                            </p>
                                        <div class="login_submit">
                                            <button type="submit">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>    
                            </div>
                            <!--register area end-->
                        </div>
            </div>
            <!-- customer login end -->

        </div>
        <!--pos page inner end-->
    </div> 
</div>
<!--pos page end-->
@endsection
@include('layouts.master')