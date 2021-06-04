@section('content')
       <!--breadcrumbs area start-->
       <div class="breadcrumbs_area">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('/')}}">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>Giỏ hàng</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    
    <!--shopping cart area start -->
    <div class="shopping_cart_area">
        @if (Cart::count() > 0)
        <form action="{{asset('/update-cart-qty')}}" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                @php
                                    $content = Cart::content();
                                @endphp
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product-price">Giá sản phẩm</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng</th>
                                            <th class="product_remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    @foreach($content as $cart_cont)
                                    <tbody>
                                        <tr> 
                                            <td class="product_thumb"><a href="#"><img src="{{asset('upload/product/'.$cart_cont->options->image)}}" alt=""></a></td>
                                            <td class="product_name"><a href="#">{{$cart_cont->name}}</a></td>
                                            <td class="product-price">{{number_format($cart_cont->price)}} VNĐ</td>
                                            <td class="product_quantity">
                                                <form action="{{asset('/update-cart-qty')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$cart_cont->rowId}}" name="cart_rowId">
                                                    <input name="cart_qty" min="0" max="100" value="{{$cart_cont->qty}}" type="number">
                                                    <input type="submit" name="update_qty" class="btn btn-medium" value="update" >
                                                </form>
                                            </td>
                                            <td class="product_total">
                                                @php
                                                    $subtotal = $cart_cont->price * $cart_cont->qty;
                                                    echo number_format($subtotal).' '.'VNĐ';
                                                @endphp
                                            </td>
                                            <td class="product_remove"><a href="{{asset('/delete-cart/'.$cart_cont->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>   
                            </div>  
                            {{-- <div class="cart_submit">
                                <button type="submit" name="update_qty">update cart</button>
                            </div>       --}}
                        </div>
                     </div>
                 </div>
                 
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Thanh toán</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Tổng</p>
                                       <p class="cart_amount">{{Cart::subtotal()}} VNĐ</p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Phí vận chuyển</p>
                                       <p class="cart_amount">0 VNĐ</p>
                                   </div>
                                   
                                   <div class="cart_subtotal">
                                       <p>Tổng đơn hàng</p>
                                       <p class="cart_amount">{{Cart::subtotal()}} VNĐ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       
                                       <a href="{{asset('/checkout')}}">Thanh toán</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        </form>
        @else
        <form action="{{asset('/update-cart-qty')}}" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                @php
                                    $content = Cart::content();
                                @endphp
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product-price">Giá sản phẩm</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng</th>
                                            <th class="product_remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    @foreach($content as $cart_cont)
                                    <tbody>
                                        <tr> 
                                            <td class="product_thumb"><a href="#"><img src="{{asset('upload/product/'.$cart_cont->options->image)}}" alt=""></a></td>
                                            <td class="product_name"><a href="#">{{$cart_cont->name}}</a></td>
                                            <td class="product-price">{{number_format($cart_cont->price)}} VNĐ</td>
                                            <td class="product_quantity">
                                                <form action="{{asset('/update-cart-qty')}}" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$cart_cont->rowId}}" name="cart_rowId">
                                                    <input name="cart_qty" min="0" max="100" value="{{$cart_cont->qty}}" type="number">
                                                    <input type="submit" name="update_qty" class="btn btn-medium" value="update" >
                                                </form>
                                            </td>
                                            <td class="product_total">
                                                @php
                                                    $subtotal = $cart_cont->price * $cart_cont->qty;
                                                    echo number_format($subtotal).' '.'VNĐ';
                                                @endphp
                                            </td>
                                            <td class="product_remove"><a href="{{asset('/delete-cart/'.$cart_cont->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>   
                            </div>  
                            {{-- <div class="cart_submit">
                                <button type="submit" name="update_qty">update cart</button>
                            </div>       --}}
                        </div>
                     </div>
                 </div>
                 
                 <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code">
                                <h3>Thanh toán</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Tổng</p>
                                       <p class="cart_amount">{{Cart::subtotal()}} VNĐ</p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Phí vận chuyển</p>
                                       <p class="cart_amount">0 VNĐ</p>
                                   </div>
                                   
                                   <div class="cart_subtotal">
                                       <p>Tổng đơn hàng</p>
                                       <p class="cart_amount">{{Cart::subtotal()}} VNĐ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       
                                       <a href="{{asset('/')}}" onclick="alert('Chưa có sản phẩm nào trong giỏ hàng')">Thanh toán</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
        </form> 
        @endif 
     </div>
     <!--shopping cart area end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection
@include('layouts.master')
