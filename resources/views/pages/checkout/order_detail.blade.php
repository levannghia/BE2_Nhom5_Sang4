@section('title')
    Chi tiết đơn hàng
@endsection
@section('content')
    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--breadcrumbs area start-->
                <div class="breadcrumbs_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="{{ asset('/') }}">Trang chủ</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>Chi tiết đơn hàng</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs area end-->


                <!--Checkout page section-->
                <div class="Checkout_section">
                    <div class="checkout_form">
                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <form action="#">
                                    <h3>Đơn hàng của bạn</h3>
                                    <div class="order_table table-responsive mb-30">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Tổng giá tiền</th>
                                                    <th>Đánh giá</th>
                                                </tr>
                                            </thead>
                                            @foreach ($orderDetail as $cart_cont)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $cart_cont->product_name }}<strong> ×
                                                                {{ $cart_cont->sale_quantity }}</strong></td>
                                                        <td>
                                                            @php
                                                                $subtotal = $cart_cont->product_price * $cart_cont->sale_quantity;
                                                                echo number_format($subtotal) . ' ' . 'VNĐ';
                                                            @endphp
                                                        </td>
                                                        <td><button type="button" class="btn btn-outline-warning"><a
                                                                    class="product_title"
                                                                    href="{{ url('/review/id=' . $cart_cont->order_detail_id) }}">Đánh
                                                                    giá</a></button></td>

                                                    </tr>
                                                </tbody>
                                            @endforeach
                                            <tfoot>
                                                <tr class="order_total">
                                                    <th>Thanh toán</th>
                                                    <td>
                                                        <strong>
                                                            {{ $order->order_total }} VNĐ
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <h3>Thông tin đơn hàng</h3>
                                <div class="row">
                                    @foreach ($shipping as $item)
                                        <div class="col-lg-6 mb-30">
                                            <label>Họ Tên <span>*</span></label>
                                            <p>{{ $item->shipping_name }}</p>
                                        </div>
                                        <div class="col-12 mb-30">
                                            <label>Địa chỉ <span>*</span></label>
                                            <p>{{ $item->shipping_address }}</p>
                                        </div>

                                        <div class="col-lg-6 mb-30">
                                            <label>Số điện thoại<span>*</span></label>
                                            <p>{{ $item->shipping_phone }}</p>

                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label> Email <span>*</span></label>
                                            <p>{{ $item->shipping_email }}</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="order-notes">
                                                <label for="order_note">Ghi chú</label>
                                                <p>{{ $item->shipping_note }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Checkout page section end-->

            </div>
            <!--pos page inner end-->
        </div>
    </div>
    <!--pos page end-->
@endsection
@include('layouts.master')
