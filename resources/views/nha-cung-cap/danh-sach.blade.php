@extends('trangchu')
@section('content')
 <div class="table-responsive">
 <a href="{{route('nha-cung-cap.them-moi')}}"><button type="submit" class="btn btn-info">Thêm mới</button></a>
        <table class="table table-striped table-sm" border="1">
        <form action="{{route('nha-cung-cap.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
          <thead>
          <h3>Danh Sách Nhà Cung Cấp</h3>
            <tr class = "table-dark">
                <th>ID</th>
                <th>Tên Nhà Cung Cấp</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th style="width:135px;text-align:center;padding-bottom:20px;">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsNCC as $ncc)
                <tr>
                    <td>{{ $ncc->id }}</td>
                    <td>{{ $ncc->ten}}</td>
                    <td>{{ $ncc->sdt}}</td>
                    <td>{{ $ncc->dia_chi}}</td>      
                    <td><a href="{{ route('nha-cung-cap.cap-nhat', ['id' => $ncc->id]) }}"><button type="button" class="btn btn-success">Sửa</button></a>|<a href="{{ route('nha-cung-cap.xoa', ['id' => $ncc->id]) }}"><button type="button" style="height: 33px; width: 50px;" class="btn btn-danger btn-sm px-3"><i class="glyphicon glyphicon-remove"></i></button></a></td>      
                <tr>
                
            @endforeach
          </tbody>
        </table>
        
    </div>
@endsection

