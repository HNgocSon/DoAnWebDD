@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <form class="form-inline" action="{{ route('san-pham.search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" style="width: 400px;" name="query" placeholder="Search for products">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                   
                </div>
            </div>
        </form>
        <a href="{{ route('san-pham.them-moi-bien-the', ['id' => $dsSanPham->id]) }}">
            <button type="button" class="btn btn-info">Thêm Mới</button>
        </a>
        <h3>Danh sách Biến Thể</h3>
        
        <form class="form-inline" method="get" action="{{ route('san-pham.danh-sach') }}">
            <div class="form-group" style="max-width: 200px;">
                <label for="Page" style="color :red;font-size: 13px;">Số lượng dòng trên mỗi trang:</label>
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
                <th>Giá</th>
                <th>Mô Tả</td>
                <th>Số Lượng</th>
                <th>Màu</th>
                <th>Màn Hình</td>
                <th>Camera</th>
                <th>Hệ Điều Hành</th>
                <th>Chip</td>
                <th>Ram</th>
                <th>Dung Lượng</th>
                <th>Pin</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
              
            @foreach($dsBienThe as $bienThe)
            <tr>
                <td>{{ $bienThe->id }}</td>
                <td>{{ $bienThe->san_pham->ten }}</td>
                <td>{{ $bienThe->gia}}</td>
                <td>{{ $bienThe->mo_ta}}</td>
                <td>{{ $bienThe->so_luong}}</td>
                <td>{{ $bienThe->mau}}</td>
                <td>{{ $bienThe->man_hinh}}</td>
                <td>{{ $bienThe->camera}}</td>
                <td>{{ $bienThe->he_dieu_hanh}}</td>
                <td>{{ $bienThe->chip}}</td>
                <td>{{ $bienThe->ram}}</td>
                <td>{{ $bienThe->dung_luong}}</td>
                <td>{{ $bienThe->pin}}</td>
                
                <td><a href="{{ route('san-pham.cap-nhat-bien-the', ['id' => $bienThe->id]) }}"><button type="button" class="btn btn-success ">Sửa</button></a> | <a href="{{ route('san-pham.xoa-bien-the', ['id' => $bienThe->id]) }}"><button type="button" style="height: 33px; width: 50px;" class="btn btn-danger btn-sm px-3"><i class="glyphicon glyphicon-remove"></i></button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a href="{{ route('san-pham.danh-sach') }}"><button type="button" class="btn btn-success">quay lại</button></a>
        <div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsBienThe->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsBienThe->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsBienThe->currentPage() - 1); $i <= min($dsBienThe->currentPage() + 1, $dsBienThe->lastPage()); $i++)
                <li class="page-item {{ $i == $dsBienThe->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsBienThe->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsBienThe->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsBienThe->nextPageUrl() }}" aria-label="Next">
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
