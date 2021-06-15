@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
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
              <th>Tên danh mục<code></code></th>
              <th>Hiển thị</th>
              <th>Trạng thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($category as $cate)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $cate->category_name }}</td>
              <td><span class="text-ellipsis">{{ $cate->category_description }}</span></td>
              <td><span class="text-ellipsis">
                    @if($cate->category_status == 'Hiện' )
                      <a href="{{URL::to('/unactive-category/id='.$cate->category_id)}}"><span class="fa-thumbs-styling fa fa-thumbs-up"></span></a>
                    @else
                      <a href="{{URL::to('/active-category/id='.$cate->category_id)}}"><span class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                    
                    @endif
              </span></td>
              <td>
                <a  href="{{URL::to('/edit-category/id='.$cate->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o"></i>
                  <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')" href="{{URL::to('/delete-category/id='.$cate->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
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
              {{$category->links()}}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  </section>
@endsection
