@extends('trangchu')
@section('content')
<div class="table-responsive">
      <a href="{{route('san-pham.them-moi')}}"><button type="button" class="btn btn-info">Thêm Mới</button></a>
        <table class="table table-striped table-sm" border="1">
          <form action="{{route('san-pham.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
        <h3>Danh sách sản phẩm</h3>
        
        <form method="get" action="{{ route('san-pham.danh-sach') }}">
            <label for="Page">Số lượng dòng trên mỗi trang:</label>
            <select name="Page" id="Page" onchange="this.form.submit()">
                <option value="5" {{ $Page == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $Page == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ $Page == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ $Page == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $Page == 100 ? 'selected' : '' }}>100</option>
           
            </select>
        </form>
          <thead>
            <tr class = "table-dark">
                <th>ID</td>
                <th>Tên SP</th>
                <th>Loại Sản Phẩm</th>
                <th>Giá</th>
                <th >Mô tả</th>
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
                <th>Thao Tác</th>  
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
        <div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsSanPham->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsSanPham->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsSanPham->currentPage() - 1); $i <= min($dsSanPham->currentPage() + 1, $dsSanPham->lastPage()); $i++)
                <li class="page-item {{ $i == $dsSanPham->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsSanPham->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsSanPham->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsSanPham->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">Next &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
</div>

</div>

@endsection
