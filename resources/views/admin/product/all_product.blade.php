@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê sản phẩm
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
              <th>Hình ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Mô tả</th>
              <th>Tóm tắt</th>
              <th>Danh mục</th>
              <th>Đánh giá</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td><a href="{{URL::to('/edit-product/id='.$product->product_id)}}"><img src="upload/product/{{ $product->product_image }}" height="100" width="100"></a></td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->product_price }}</td>
              <td><span class="text-ellipsis">{{ $product->product_description }}</span></td>
              <td><span class="text-ellipsis">{{ $product->product_content }}</span></td>
              <td>{{ $product->category_name }}</td>
              <td>{{ $product->product_rating }}/5</td>
              <td>
                <a  href="{{URL::to('/edit-product/id='.$product->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
                  <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{URL::to('/delete-product/id='.$product->product_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              {{ $products->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
