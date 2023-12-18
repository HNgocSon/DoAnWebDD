@extends('trangchu')
@section('content')
      <div class="table-responsive">
      <a href="{{route('admin.them-moi')}}"><button type="button" class="btn btn-info">Thêm Mới</button></a>
        <table class="table table-striped table-sm" border="1">
          <form action="{{route('admin.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
        <h3>Tài Khoản Admin</h3>
          <thead>
            <tr>
                <th>Tên</td>
                <th>Tên Đăng Nhập</th>
                <th>Quyền</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsAdmin as $admin)
            <tr>
                <td>{{ $admin->ten }}</td>
                <td>{{ $admin->ten_dang_nhap }}</td>
                @if ($admin->quyen)
                    <td>{{ $admin->quyen->ten_quyen }}</td>
                @else
                    <td>Admin</td> 
                @endif
                @if ($admin->quyen_id == 0)
                    <td>Tài Khoản Gốc</td>
                @else
                <td><a href="{{route('admin.cap-nhat',['id'=>$admin->id])}}"><button type="button" class="btn btn-success">Sữa</button></a>|<a href="{{route('admin.xoa',['id'=>$admin->id])}}"><button type="button" class="btn btn-success">Xóa</button></a></td>
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
    
</div>
@endsection