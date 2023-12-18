@extends('trangchu')
@section('content')

<div class="table-responsive">
    <table class="table table-striped table-sm" border="1">
    <h3>Chi Tiết Tài Khoản</h3>
        <thead>
            <tr>
                <th>Tên Tài Khoản</td>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $KhachHang->ten }}</td>
                <td>{{ $KhachHang->sdt }}</td>
                <td>{{ $KhachHang->dia_chi }}</td>
                <td>{{ $KhachHang->email }}</td>
                @if($KhachHang->status == 0)
                <td>Tài Khoản Chưa xác Nhận</td>
                @endif
                @if($KhachHang->status == 1)
                <td>Tài Khoản Đã Xác Nhận </td>
                @endif
            </tr>
        </tbody>
    </table>
    <a href="{{route('khach-hang.danh-sach')}}"><button type="submit" class="btn btn-info">quay lai</button></a>
</div>
@endsection