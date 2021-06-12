@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin khách hàng
        </div>
        <div class="table-responsive">
            @php
            $message = Session::get('message');
            if ($message) {
                echo '<p class="text-alert">'.$message.'</p>';
                Session::put('message',null);
            }
            @endphp   
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                    <label class="i-checks m-b-none">
                        <input type="checkbox"><i></i>
                    </label>
                    </th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orderById as $order_detail)
                    <tr>
                    
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $order_detail->name }}</td>
                        <td>{{ $order_detail->address }}</td>
                        <td>{{ $order_detail->email }}</td>
                        <td>{{ $order_detail->telephone }}</td>
                        
                        
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            @php
            $message = Session::get('message');
            if ($message) {
                echo '<p class="text-alert">'.$message.'</p>';
                Session::put('message',null);
            }
            @endphp   
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                    <label class="i-checks m-b-none">
                        <input type="checkbox"><i></i>
                    </label>
                    </th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ nhận hàng</th>
                    <th>Số điện thoại người nhận</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach ($orderById as $order_detail)
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    
                    <td>{{ $order_detail->name }}</td>
                    <td>{{ $order_detail->shipping_address }}</td>
                    <td>{{ $order_detail->shipping_phone }}</td>
                    
                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Xem chi tiết đơn hàng
        </div>
        <div class="table-responsive">
            @php
            $message = Session::get('message');
            if ($message) {
                echo '<p class="text-alert">'.$message.'</p>';
                Session::put('message',null);
            }
            @endphp   
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                    <label class="i-checks m-b-none">
                        <input type="checkbox"><i></i>
                    </label>
                    </th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetail as $order_detail_product)
                    <tr>
                        
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $order_detail_product->product_name }}</td>
                        <td>{{ $order_detail_product->sale_quantity }}</td>
                        <td>{{ $order_detail_product->product_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
