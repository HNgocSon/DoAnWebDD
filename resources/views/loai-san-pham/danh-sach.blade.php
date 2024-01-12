@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm " border="1">
        
        <div>
            <a href="{{route('loai-san-pham.them-moi')}}"><buttontype="button" class="btn btn-info">Thêm mới</button></a>
        </div>
        <form class="form-inline" action="{{ route('loai-san-pham.search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" style="width: 400px;" name="query" placeholder="Search for products">
                <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <h3>Danh Sách Loại Sản Phẩm</h3> 
        <form class="form-inline" method="get" action="{{ route('loai-san-pham.danh-sach') }}">
            <div class="form-group" style="max-width: 200px;">
                <label for="Page" style="color :red;font-size: 13px;">Số lượng dòng trên mỗi trang:</label>
                <select class="form-control" name="Page" id="Page" onchange="this.form.submit()">
                    <option value="5"  {{ $Page == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ $Page == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ $Page == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ $Page == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $Page == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </form>

          <thead>
            <tr class = "table-dark">
                <th>ID</th>
                <th>Tên Loại</th>
                <th style="width: 150px;text-align:center;">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsLoaiSp as $LoaiSp)
            <tr>
                <td>{{ $LoaiSp->id }}</td>
                <td>{{ $LoaiSp->ten_loai}}</td>
                <td> <a href="{{route('loai-san-pham.cap-nhat',['id'=>$LoaiSp->id])}}"><button type="submit" class="btn btn-success">Sửa</button></a> | <a href="{{route('loai-san-pham.xoa', ['id'=>$LoaiSp->id] ) }}"><button type="button" style="height: 33px; width: 50px;" class="btn btn-danger btn-sm px-3"><i class="glyphicon glyphicon-remove"></i></button></a></td>
            <tr>
            @endforeach
            </tbody>  
</table>
<div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsLoaiSp->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsLoaiSp->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsLoaiSp->currentPage() - 1); $i <= min($dsLoaiSp->currentPage() + 1, $dsLoaiSp->lastPage()); $i++)
                <li class="page-item {{ $i == $dsLoaiSp->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsLoaiSp->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsLoaiSp->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsLoaiSp->nextPageUrl() }}" aria-label="Next">
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