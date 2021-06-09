@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Quản lý Đánh giá
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
              <th>Hình ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Tên người dùng</th>
              <th>Số sao</th>
              <th>Đánh giá</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reviews as $review)
            <tr>
              <td><img src="upload/product/{{ $review->product_image }}" height="100" width="100"></td>
              <td>{{ $review->product_name }}</td>
              <td>{{ $review->name }}</td>
              <td>{{ $review->rating }}/5</td>
              <td>{{ $review->comment }}</td>
            </tr>
            @endforeach
            
          </tbody>
          {{ $reviews->links() }}
        </table>
      </div>
    </div>
  </div>
@endsection
