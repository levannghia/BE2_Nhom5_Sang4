@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật Danh mục sản phẩm
                </header>
                @foreach ($category as $cate)
                <div class="panel-body">
                    @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<p class="text-alert">'.$message.'</p>';
                        Session::put('message',null);
                    }
                    @endphp
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-product/id='.$cate->category_id)}}" method="post">
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_name" value="{{ $cate->category_name }}" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize:none" rows="5" name="category_desc" class="form-control" id="editor">{{ $cate->category_description }}
                            </textarea>
                        </div>
                        
                        <button type="submit" name="update_category_product" class="btn btn-info">Chỉnh sửa danh mục</button>
                    </form>
                    </div>

                </div>
                @endforeach
                
            </section>

    </div>     
@endsection
