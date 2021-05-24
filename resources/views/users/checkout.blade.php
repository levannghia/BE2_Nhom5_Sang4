@extends('layouts/master')

@section('title')
Checkout
@endsection

@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>checkout</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Returning customer?
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>

                </h3>
                <div id="checkout_login" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                        <form action="#">
                            <div class="form_group mb-20">
                                <label>Username or email <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group mb-25">
                                <label>Password <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group group_3 ">
                                <input value="Login" type="submit">
                                <label for="remember_box">
                                    <input id="remember_box" type="checkbox">
                                    <span> Remember me </span>
                                </label>
                            </div>
                            <a href="#">Lost your password?</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Returning customer?
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

                </h3>
                <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <form action="#">
                            <input placeholder="Coupon code" type="text">
                            <input value="Apply coupon" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="checkout.html" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                                @break
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-12 mb-30">
                            <label>Full Name <span>*</span></label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Phone <span>*</span></label>
                            <input type="text" name="telephone" value="{{ old('telephone') }}">
                        </div>
                        <div class="col-lg-12 mb-30">
                            <label>address<span>*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="order_button">
                        <button type="submit">Proceed to PayPal</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6">
                <form action="#">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $cart = Session::get('CART'); @endphp
                                @foreach ($cart->items as $cartItem)
                                <tr>
                                    <td> {{ $cartItem['item']->product_name }} <strong> × {{ $cartItem['quantity'] }}</strong></td>
                                    <td> {{ number_format($cartItem['price']) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Quantity total</th>
                                    <td>${{ $cart->totalQty ?? '' }}</td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>${{ number_format($cart->totalPrice) ?? '' }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection