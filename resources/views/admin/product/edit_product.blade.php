@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<p class="text-alert">'.$message.'</p>';
                        Session::put('message',null);
                    }
                    @endphp
                    @foreach ($product as $product) 
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-product/id='.$product->product_id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                           
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <br>
                            <img src="{{asset('upload/product/'.$product->product_image)}}" height="150" width="150" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" value="{{ $product->product_price }}" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize:none" rows="5" name="product_desc" class="form-control" id="exampleInputPassword1" >{{ $product->product_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tóm tắt sản phẩm</label>
                            <textarea style="resize:none" rows="5" name="product_content" class="form-control" id="exampleInputPassword1">{{ $product->product_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $cate)
                                   <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option> 
                                @endforeach
                                                               
                            </select>
                        </div>
                        <button type="submit" name="edit_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    </div>
                
                </div>
                @endforeach
            </section>

    </div>     
@endsection