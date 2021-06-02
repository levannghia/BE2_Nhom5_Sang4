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
    <section class="main_content_area">
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
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                           
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                            <li><a href="{{route('logout')}}" class="nav-link">logout</a></li>
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Orders</h3>
                            <div class="coron_table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="success">Completed</span></td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$17.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        
                    
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      	
</section>			
<!-- End Maincontent  --> 
</div>
<!--pos page inner end-->
</div>
</div>

    </div>
    <!--pos page inner end-->
    </div>
    </div>
    <!--pos page end-->

@endsection
@include('layouts.master')
