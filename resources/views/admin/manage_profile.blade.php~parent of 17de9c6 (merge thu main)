@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông tin cá nhân
                </header>
                <div class="panel-body">
                    @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<p class="text-alert">'.$message.'</p>';
                        Session::put('message',null);
                    }
                    @endphp
                    @foreach ($userId as $data) 
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/edit-profile/id='.$data->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                           
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ Tên</label>
                            <input type="text" name="user_name" value="{{ $data->name }}" class="form-control" id="exampleInputEmail1">
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <br>
                            <img src="{{asset('upload/product/'.$product->product_image)}}" height="150" width="150" alt="">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="user_email" value="{{ $data->email }}" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input type="password" name="user_password" value="{{ $data->password }}" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <textarea style="resize:none" rows="5" name="user_address" class="form-control" id="exampleInputPassword1">{{ $data->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" name="user_tel" value="{{ $data->telephone }}" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <button type="submit" name="edit_product" class="btn btn-info">Cập nhật</button>
                    </form>
                    </div>
                
                </div>
                @endforeach
            </section>

    </div>     
@endsection
