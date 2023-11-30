@extends('trangchu')
@section('content')
<div class="table-responsive">
      <a href="{{route('san-pham.them-moi')}}"><button type="button" class="btn btn-info">Thêm Mới</button></a>
        <table class="table table-striped table-sm" border="1">
        <h3>Danh sách sản phẩm</h3>
          <thead>
            <tr class = "table-dark">
                <th>ID</td>
                <th>Tên SP</th>
                <th>Loại Sản Phẩm</th>
                <th>Giá</th>
                <th style="width:135px;text-align:center;padding-bottom:20px;">Mô tả</th>
                <th>Số Lượng</th>
                <th>Màu</th>
                <th>Màn Hình</th>
                <th>Camera</th>
                <th>Hệ Điều Hành</th>
                <th>Chip</th>
                <th>Ram</th>
                <th>Dung Lượng</th>
                <th>Pin</th>
                <th>Hình Ảnh</th> 
                <th style="width:135px;text-align:center;padding-bottom:20px;">Thao Tác</th>  
            </tr>
          </thead>
            <tbody>
            @foreach($dsSanPham as $sanPham)
            <tr>
                <td>{{ $sanPham->id }}</td>
                <td>{{ $sanPham->ten }}</td>
                <td>{{ $sanPham->loai_san_pham->ten_loai}}</td>
                <td>{{ $sanPham->gia}}</td>
                <td>{{ $sanPham->mo_ta}}</td>
                <td>{{ $sanPham->so_luong }}</td>
                <td>{{ $sanPham->mau}}</td>    
                <td>{{ $sanPham->man_hinh }}</td>
                <td>{{ $sanPham->camera}}</td>  
                <td>{{ $sanPham->he_dieu_hanh }}</td>
                <td>{{ $sanPham->chip}}</td>  
                <td>{{ $sanPham->ram }}</td>
                <td>{{ $sanPham->dung_luong}}</td>  
                <td>{{ $sanPham->pin}}</td>
                <td><a href="{{ route('san-pham.xem-anh', ['id' => $sanPham->id]) }}"><button type="button" class="btn btn-success">Xem</button></a></td>
                <td><a href="{{ route('san-pham.cap-nhat', ['id' => $sanPham->id]) }}"><button type="button" class="btn btn-success ">Sửa</button></a> | <a href="{{ route('san-pham.xoa', ['id' => $sanPham->id]) }}"><button type="button" style="height: 33px; width: 50px;" class="btn btn-danger btn-sm px-3"><i class="glyphicon glyphicon-remove"></i></button></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
        @endsection
</div>
