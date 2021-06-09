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
                {{-- <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                    <a  href="{{URL::to('/view-order/id='.$order->order_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
                        <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')" href="{{URL::to('/delete-transaction/id='.$order->transaction_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
                {{ $orders->links() }} --}}
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
                {{-- <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                    <a  href="{{URL::to('/view-order/id='.$order->order_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
                        <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')" href="{{URL::to('/delete-transaction/id='.$order->transaction_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
                {{ $orders->links() }} --}}
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
                    <th>Tổng giá tiền</th>
                    <th>Tình trạng đơn hàng</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                {{-- <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                    <a  href="{{URL::to('/view-order/id='.$order->order_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
                        <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không?')" href="{{URL::to('/delete-transaction/id='.$order->transaction_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
                {{ $orders->links() }} --}}
            </table>
        </div>
    </div>
</div>
@endsection
