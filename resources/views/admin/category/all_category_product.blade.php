@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
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
              <th>Ngày thêm</th>
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
