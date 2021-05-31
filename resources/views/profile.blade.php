@section('title')
    Profile
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
                        <li>Profile</li>
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
                    <h2>My Profile</h2>
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
                    <form action="{{route('edit-profile')}}" method="POST">         
                        @csrf
                        @method('PUT')
                       @if (Auth::check())
                    <p>
                        <label>Email address <span>*</span></label>
                        <h4>{{ Auth::user()->email }}</h4>
                    </p>
                    <p>
                        <label>User name <span>*</span></label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}">
                    </p>
                    
                    <p>
                        <label>Address <span>*</span></label>
                        <input type="text" name="address" id="" value="{{ Auth::user()->address }}">
                    </p>
                    <p>
                        <label>Tel <span>*</span></label>
                        <input type="text" name="phone" id="" value="{{ Auth::user()->telephone }}">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Update</button>
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
