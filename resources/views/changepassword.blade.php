@section('title')
    Change Password
@endsection
@section('content')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('home')}}">trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Đổi mật khẩu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login">
        <div class="row">

            <!--register area start-->
            <div class="col-lg-5 col-md-5">
                <div class="account_form register">
                    <h2>Đổi mật khẩu</h2>
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if (Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                    <form action="{{url('change-password')}}" method="POST">         
                        @csrf
                        
                       @if (Auth::check())
                    <p>
                        <h4><i class="fa fa-user"></i> {{ Auth::user()->name }}</h4>
                    </p>
                    <p>
                        <label>Mật khẩu cũ <span>*</span></label>
                        <input type="password" name="oldpassword" value="{{ old('oldpassword') }}" placeholder="********">
                       
                    </p>
                    
                    <p>
                        <label>Mật khẩu mới<span>*</span></label>
                        <input type="password" name="newpassword" value="{{ old('newpassword') }}" >
                       
                    </p>
                    <p>
                        <label>Nhập lại mật khẩu mới <span>*</span></label>
                        <input type="password" name="confirmpassword" >
                        
                    </p>
                    <div class="login_submit">
                        <button type="submit">Xác nhận</button>
                    </div>
                       @endif
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
