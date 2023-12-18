@extends('trangchu')
@section('content')
      <div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h3>Hóa Đơn</h3>
          <thead>
            <tr>
                <th>Khách Hàng</th>
                <th>Ngày Tạo</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsHoaDonXuat as $hoaDon)
            <tr>
                <td>{{ $hoaDon->khach_hang->ten}}</td>
                <td>{{ $hoaDon->ngay_xuat }}</td>
                <td>{{ $hoaDon->tong_tien }}</td>
                @if($hoaDon->status == 1){
                  <td>Đã Thanh Toán</td>
                @endif

                @if ($hoaDon->status == 2)
                    <td>Đã Hủy</td>
                @else
                    <td>Chưa Thanh Toán</td> 
                    <td> <a href="#"><button type="submit" class="btn btn-success">Thay Đỏi Trạng Thái Đơn</button></a></td>
                @endif
              
                <td> <a href="{{route('hoa-don-xuat.chi-tiet',['id'=>$hoaDon->id])}}"><button type="submit" class="btn btn-success">Chi Tiết</button></a> | <a href="{{route('hoa-don-xuat.xoa',['id'=>$hoaDon->id])}}"><button type="submit" class="btn btn-success">Xóa Đơn</button></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
    
</div>

@endsection