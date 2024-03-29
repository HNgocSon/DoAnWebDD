@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <a href="{{ route('san-pham.them-moi') }}">
            <button type="button" class="btn btn-info">Thêm Mới</button>
        </a>
        <form class="form-inline" action="{{ route('san-pham.search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" style="width: 400px;" name="query" placeholder="Search for products">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <h3>Danh sách sản phẩm</h3>
        <form class="form-inline" method="get" action="{{ route('san-pham.danh-sach') }}">
            <div class="form-group" style="max-width: 200px;">
                <label for="Page" style="font-size: 13px;">Số lượng dòng trên mỗi trang:</label>
                <select class="form-control" name="Page" id="Page" onchange="this.form.submit()">
                    <option value="5" {{ $Page == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ $Page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $Page == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ $Page == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $Page == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </form>

          <thead>
            <tr class = "table-dark">
                <th>ID</td>
                <th>Tên SP</th>
                <th>Loại Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Biến Thể</th>
            </tr>
          </thead>
            <tbody>
              
            @foreach($dsSanPham as $sanPham)
            <tr>
                <td>{{ $sanPham->id }}</td>
                <td>{{ $sanPham->ten }}</td>
                <td>{{ $sanPham->loai_san_pham->ten_loai}}</td>

                <td><a href="{{ route('san-pham.xem-anh', ['id' => $sanPham->id]) }}"><button type="button" class="btn btn-success">Xem Ảnh</button></a></td>
                <td><a href="{{ route('san-pham.bien-the', ['id' => $sanPham->id]) }}"><button type="button" class="btn btn-success">Xem Biến Thể</button></a></td>
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
