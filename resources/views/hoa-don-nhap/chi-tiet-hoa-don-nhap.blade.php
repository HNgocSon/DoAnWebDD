@extends('trangchu')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-sm" border="1">
    <h3>Chi Tiết Hóa Đơn Nhập</h3>
        <thead>
            <tr>
                <th>Tên San Phẩm</td>
                <th>Số Lượng</th>
                <th>Giá Nhập</th>
                <th>Giá Bán</th>
                <th>Thành Tiền</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($chiTietHoaDon as $ctHoaDon)
                @if($hoaDon->id == $ctHoaDon->hoa_don_nhap_id)
                <tr>
                    <td>{{ $ctHoaDon->san_pham->ten }}</td>
                    <td>{{ $ctHoaDon->so_luong }}</td>
                    <td>{{ $ctHoaDon->gia_nhap }}</td>
                    <td>{{ $ctHoaDon->gia_ban }}</td>
                    <td>{{ $ctHoaDon->thanh_tien }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{route('hoa-don-nhap.danh-sach')}}"><button type="submit" class="btn btn-info">quay lai</button></a>
</div>

@endsection