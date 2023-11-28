@extends('trangchu')
@section('content')
      <div class="table-responsive">
      <a href="{{route('hoa-don-xuat.them-moi')}}"><button type="submit" class="btn btn-info">Thêm mới</button></a>
        <table class="table table-striped table-sm" border="1">
        <h3>Hóa Đơn</h3>
          <thead>
            <tr>
                <th>Tên Sản Phẩm</td>
                <th>Ngày Tạo</th>
                <th>Khách hàng</th>
                <th>Tổng Tiền</th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsHD as $hoaDon)
            <tr>
                <td>{{ $hoaDon->san_pham->ten}}</td>
                <td>{{ $hoaDon->ngay_tao }}</td>
                <td>{{ $hoaDon->khach_hang->ten}}</td>
                <td>{{ $hoaDon->tong_tien }}</td>
                <td> <a href="#"><button type="submit" class="btn btn-success">Duyệt đơn</button></a> | <a href="#"><button type="submit" class="btn btn-success">Hủy Đơn</button></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
    
</div>

@endsection