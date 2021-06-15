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
                        <li><a href="{{route('home')}}">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Change password</li>
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
                    <h2>Change Password</h2>
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
                        
                       @if (Auth::check() && Auth::user()->email_verified_at != NULL)
                    <p>
                        <h4><i class="fa fa-user"></i> {{ Auth::user()->name }}</h4>
                    </p>
                    @else
                    <p>
                        <h4><i class="fa fa-user"></i></h4>
                    </p>
                    @endif
                    <p>
                        <label>Old password <span>*</span></label>
                        <input type="password" name="oldpassword" value="{{ old('oldpassword') }}" placeholder="********">
                       
                    </p>
                    
                    <p>
                        <label>New password<span>*</span></label>
                        <input type="password" name="newpassword" value="{{ old('newpassword') }}" >
                       
                    </p>
                    <p>
                        <label>Confirm password <span>*</span></label>
                        <input type="password" name="confirmpassword" >
                        
                    </p>
                    <div class="login_submit">
                        <button type="submit">Change password</button>
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
