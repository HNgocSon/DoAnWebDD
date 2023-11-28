@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h1>Danh Sách Bình Luận</h1>
       
          <thead>
            <tr>
                <th>Tên</th>
                <th>Tổng Đánh Giá<th>
                <th>Bình Luận</th>
                <th>Thời Gian</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsCMT as $cmt)
            <tr>
                <td>{{ $cmt->khach_hang->ten }}</td>
                <td>{{ $cmt->tong_danh_gia}}</td>
                <td>{{ $cmt->comments }}</td>
                <td>{{ $cmt->thoi_gian}}</td>
            <tr>
            @endforeach
            </tbody>  
</table>
@endsection