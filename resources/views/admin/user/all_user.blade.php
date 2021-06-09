@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh sách User
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
              <th>Họ Tên</th>
              <th>Email</th>
              <th>Vai trò</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $data_user)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $data_user->name }}</td>
              <td>{{ $data_user->email }}</td>
              <td>
                @if($data_user->role == 1 )
                <p>Admin</p>
              @else
              <p>Người dùng</p>
              @endif
              </td>
              <td>
                  <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')" href="{{URL::to('/delete-user/id='.$data_user->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a>
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
              {{ $user->links() }}
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
