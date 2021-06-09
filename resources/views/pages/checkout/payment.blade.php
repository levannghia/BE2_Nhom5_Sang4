@section('content')

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
        @php
        $message = Session::get('message');
        if ($message) {
            echo '<p class="text-alert">'.$message.'</p>';
            Session::put('message',null);
        }
        @endphp
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
                                        <th>Product</th>
                                        <th>Total</th>
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
                @if (Cart::count() > 0)
                    
                    <div class="col-lg-6 col-md-6">
                        <form action="{{asset('/order-place')}}" method="POST">
                            @csrf
                            <h3>Phương thức thanh toán</h3>
                            <div class="row">
                                <div class="payment_method" style="margin-left: 20px">
                                    <div class="panel-default">
                                        <input id="payment" name="payment_option" type="radio" data-target="createp_account" value="1" checked="checked">
                                        <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh toán khi nhận hàng (COD)</label>

                                        {{-- <div id="method" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>Vui lòng điền đầy đủ thông tin</p>
                                            </div>
                                        </div> --}}
                                    </div> 
                                    <div class="panel-default">
                                        <input id="payment_defult" name="payment_option" type="radio" data-target="createp_account" value="2">
                                        <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Trả bằng thẻ ATM 
                                        <img src="{{asset('img\visha\papyel1.png')}}" alt=""></label>

                                        {{-- <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>Trả bằng thẻ ATM</p> 
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="order_button" style="margin-top:115px">
                                        <button type="submit" onclick="alert('Cảm ơn bạn đã mua hàng')">Xác nhận</button> 
                                    </div> 
                                    
                                </div>    	    	    	    	    
                            </div>
                        </form> 
                            
                    </div>
                    
            
                @else
                    <div class="col-lg-6 col-md-6">
                    <form action="{{asset('/')}}">
                        @csrf
                        <h3>Phương thức thanh toán</h3>
                        <div class="row">
                            <div class="payment_method" style="margin-left: 20px">
                                <div class="panel-default">
                                    <input id="payment" name="payment_option" type="radio" data-target="createp_account" value="1">
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh toán khi nhận hàng (COD)</label>

                                    {{-- <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Vui lòng điền đầy đủ thông tin</p>
                                        </div>
                                    </div> --}}
                                </div> 
                                <div class="panel-default">
                                    <input id="payment_defult" name="payment_option" type="radio" data-target="createp_account" value="2">
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Trả bằng thẻ ATM 
                                    <img src="{{asset('img\visha\papyel1.png')}}" alt=""></label>

                                    {{-- <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Trả bằng thẻ ATM</p> 
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="order_button" style="margin-top:115px">
                                    <button type="submit" onclick="alert('Không có sản phẩm nào trong giỏ hàng')">Xác nhận</button> 
                                </div> 
                                
                            </div>    	    	    	    	    
                        </div>
                    </form>    
                </div>
                @endif
            </div> 
        </div>
                
</div>
<!--Checkout page section end-->
@endsection
@include('layouts.master')
