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
                        <li><a href="{{ route('profile') }}">trang chủ</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Trang cá nhân</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <section class="main_content_area">
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
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin người dùng</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Lịch sử mua hàng</a></li>
                            <li><a href="{{ route('logout') }}" class="nav-link">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade" id="account-details">
                            <h3>Chi tiết tài khoản </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">


                                        <form action="{{ route('edit-profile') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if (Auth::check() && Auth::user()->email_verified_at != NULL)
                                                <p>
                                                    <label>Email <span>*</span></label>
                                                <h4>{{ Auth::user()->email }}</h4>
                                                </p>
                                                <p>
                                                    <label>Tên của bạn <span>*</span></label>
                                                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                                                </p>

                                                <p>
                                                    <label>Địa chỉ <span>*</span></label>
                                                    <input type="text" name="address" id=""
                                                        value="{{ Auth::user()->address }}">
                                                </p>
                                                <p>
                                                    <label>Điện thoại <span>*</span></label>
                                                    <input type="text" name="phone" id=""
                                                        value="{{ Auth::user()->telephone }}">
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
                        <div class="tab-pane fade" id="orders">
                            <h3>Lịch sử mua hàng</h3>
                            <div class="coron_table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Ngày mua</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Giá tiền</th>
                                            <th>Xem chi tiết</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $i = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($getOrder as $item)
                                        @php
                                            $i++;
                                        @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->order_status }}</td>
                                                <td>{{ $item->order_total }}</td>
                                                <td><a href="{{ url('/order-detail/'.$item->order_id) }}" class="view">view</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
