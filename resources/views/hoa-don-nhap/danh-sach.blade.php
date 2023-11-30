@extends('trangchu')
@section('content')

      <div class="table-responsive">
      <a href="{{route('hoa-don-nhap.them-moi')}}"><button type="submit" class="btn btn-info">Thêm mới</button></a>
        <table class="table table-striped table-sm" border="1">
        <h3>Hóa Đơn Nhập</h3>
          <thead>
            <tr>
                <th>Nhà Cung Cấp</td>
                <th>Ngày Nhập</th>
                <th>Tổng Tiền</th>
           
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsHoaDonNhap as $HoaDon)
            <tr>
                <td>{{ $HoaDon->nha_cung_cap->ten }}</td>
                <td>{{ $HoaDon->ngay_nhap }}</td>
                <td>{{ $HoaDon->tong_tien }}</td>
                <td><a href="{{ route('hoa-don-nhap.chi-tiet-hoa-don-nhap', ['id' => $HoaDon->id]) }}"><button type="button" class="btn btn-success">xem chi tiet</button></a>|<a href="{{ route('hoa-don-nhap.xoa', ['id' => $HoaDon->id]) }}"><button type="button" class="btn btn-success">xoa</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    
</div>

@endsection