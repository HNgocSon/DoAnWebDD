@extends('trangchu')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm" border="1">
    <h3>Chi Tiết Hóa Đơn Xuất </h3>
        <thead>
            <tr>
                <th>Tên San Phẩm</td>
                <th>Màu</td>
                <th>Dung Lượng</td>
                <th>Số Lượng</th>
                <th>Đơn Giá </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($chiTietHoaDon as $ctHoaDon)
                @if($hoaDon->id == $ctHoaDon->hoa_don_xuat_id)
                <tr>
                    <td>{{ $ctHoaDon->san_pham->ten }}</td>
                    <td>{{ $ctHoaDon->san_pham_bien_the->mau }}          
                    <td>{{ $ctHoaDon->san_pham_bien_the->dung_luong }}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </td>
                    <td>{{ $ctHoaDon->so_luong }}</td>
                    <td>{{ $ctHoaDon->don_gia }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{route('hoa-don-xuat.danh-sach')}}"><button type="submit" class="btn btn-info">quay lai</button></a>
</div>
@endsection