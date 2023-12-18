@extends('trangchu')
@section('content')
      <div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
          <form action="{{route('khach-hang.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
        <h3>Tài Khoản Khách Hàng</h3>
          <thead>
            <tr>
                <th>Tên</td>
                <th>Email</th>
                <th>Số Điện Thoại</th>
           
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsKhachHang as $KhachHang)
            <tr>
                <td>{{ $KhachHang->ten }}</td>
                <td>{{ $KhachHang->email }}</td>
                <td>{{ $KhachHang->sdt }}</td>
                <td><a href="{{ route('khach-hang.chi-tiet',['id'=>$KhachHang->id])}}"><button type="button" class="btn btn-success">xem chi tiet</button></a>|<a href="{{ route('khach-hang.xoa',['id'=>$KhachHang->id])}}"><button type="button" class="btn btn-success">xoa</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    
</div>
@endsection