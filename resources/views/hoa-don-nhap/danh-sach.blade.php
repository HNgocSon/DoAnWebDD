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
            </tr>
          </thead>
            <tbody>
            @foreach($dsHDN as $HDN)
            <tr>
                <td>{{ $HDN->nha_cung_cap->ten }}</td>
                <td>{{ $HDN->ngay_nhap }}</td>
                <td>{{ $HDN->tong_tien }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    
</div>

@endsection