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
                                <li><a href="{{asset('/')}}">trang chủ</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>thanh toán</li>
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
                                    <h3>Đơn hàng</h3> 
                                    <div class="order_table table-responsive mb-30">
                                        @php
                                            $content = Cart::content();
                                        @endphp
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Tổng giá tiền</th>
                                                </tr>
                                            </thead>
                                            @foreach($content as $cart_cont)
                                            <tbody>
                                                <tr>
                                                    <td> {{$cart_cont->name}} <strong> × {{$cart_cont->qty}}</strong></td>
                                                    <td> 
                                                        @php
                                                            $subtotal = $cart_cont->price * $cart_cont->qty;
                                                            echo number_format($subtotal).' '.'VNĐ';
                                                        @endphp
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                            <tfoot>
                                                <tr class="order_total">
                                                    <th>Thanh toán</th>
                                                    <td><strong> 
                                                        {{Cart::subtotal()}} VNĐ
                                                    </strong></td>
                                                </tr>
                                            </tfoot>
                                            
                                        </table>     
                                    </div>
                                </form>         
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <form action="{{asset('/save-checkout')}}" method="POST">
                                    @csrf
                                    <h3>Thông tin vận chuyển</h3>
                                    <div class="row">
                                        @if (Auth::check())
                                        <div class="col-lg-6 mb-30">
                                            <label>Họ Tên <span>*</span></label>
                                            <input type="text" name="shipping_name" value="{{ Auth::user()->name }}">    
                                        </div>
                                        <div class="col-12 mb-30">
                                            <label>Địa chỉ  <span>*</span></label>
                                            <input placeholder="Số nhà, tên đường, quận/huyện, tỉnh/thành phố" type="text" name="shipping_address" value="{{ Auth::user()->address }}">     
                                        </div>
                                        
                                        <div class="col-lg-6 mb-30">
                                            <label>Số điện thoại<span>*</span></label>
                                            <input type="text" name="shipping_phone" value="{{ Auth::user()->telephone }}"> 

                                        </div> 
                                            <div class="col-lg-6 mb-30">
                                            <label> Email  <span>*</span></label>
                                                <input type="text" name="shipping_email" value="{{ Auth::user()->email }}"> 

                                        </div> 
                                        
                                        <div class="col-12">
                                            <div class="order-notes">
                                                    <label for="order_note">Ghi chú</label>
                                                <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery." name="shipping_note"></textarea>
                                            </div>    
                                        </div>
                                        <div class="order_button" style="margin-top:30px" >
                                            <button type="submit">Đến phương thức thanh toán</button> 
                                        </div>     	    	    	
                                        @endif   	    	    	    	    
                                    </div>
                                </form>    
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
