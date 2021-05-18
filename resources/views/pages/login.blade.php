@section('content')
    
                         <!--breadcrumbs area start-->
                         <div class="breadcrumbs_area">
                            <div class="row">
                                    <div class="col-12">
                                        <div class="breadcrumb_content">
                                            <ul>
                                                <li><a href="index.html">home</a></li>
                                                <li><i class="fa fa-angle-right"></i></li>
                                                <li>login</li>
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
                                                <h2>login</h2>
                                                <form action="{{ route('login') }}" method="post">
                                                    @csrf
                                                    <p>   
                                                        <label> Email <span>*</span></label>
                                                        <input type="email" name="email">
                                                     </p>
                                                     <p>   
                                                        <label>Passwords <span>*</span></label>
                                                        <input type="password" name="password">
                                                     </p>   
                                                    <div class="login_submit">
                                                        <button type="submit">login</button>
                                                        <label for="remember">
                                                            <input id="remember" type="checkbox">
                                                            Remember me
                                                        </label>
                                                        <a href="#">Lost your password?</a>
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
                                                <h2>Register</h2>
                                                <form action="{{ route('signup') }}" method="post">
                                                    @csrf
                                                    <p>   
                                                        <label>User name <span>*</span></label>
                                                        <input type="text" name="name">
                                                     </p>
                                                     <p>   
                                                        <label>Email address  <span>*</span></label>
                                                        <input type="email" name="email">
                                                     </p>
                                                     
                                                     <p>   
                                                        <label>Address  <span>*</span></label>
                                                        <input type="text" name="address">
                                                     </p>
                                                     <p>   
                                                        <label>Telephone <span>*</span></label>
                                                        <input type="text" name="phone">
                                                     </p>
                                                     <p>   
                                                        <label>Passwords <span>*</span></label>
                                                        <input type="password" pattern="[a-zA-Z0-9!@#$%^&*]{6,}" required="" name="password">
                                                     </p>
                                                     <p>   
                                                        <label>Confirm password <span>*</span></label>
                                                        <input type="password" name="ConfirmPassword">
                                                     </p>
                                                    <div class="login_submit">
                                                        <button type="submit">Register</button>
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