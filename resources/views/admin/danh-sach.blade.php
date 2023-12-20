@extends('trangchu')
@section('content')
      <div class="table-responsive">
      <a href="{{route('admin.them-moi')}}"><button type="button" class="btn btn-info">Thêm Mới</button></a>
        <table class="table table-striped table-sm" border="1">
          <form action="{{route('admin.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
        <h3>Tài Khoản Admin</h3>
        <form method="get" action="{{ route('admin.danh-sach') }}">
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
            <tr>
                <th>Tên</td>
                <th>Tên Đăng Nhập</th>
                <th>Quyền</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsAdmin as $admin)
            <tr>
                <td>{{ $admin->ten }}</td>
                <td>{{ $admin->ten_dang_nhap }}</td>
                @if ($admin->quyen)
                    <td>{{ $admin->quyen->ten_quyen }}</td>
                @else
                    <td>Admin</td> 
                @endif
                @if ($admin->quyen_id == 1)
                    <td>Tài Khoản Gốc</td>
                @else
                <td><a href="{{route('admin.cap-nhat',['id'=>$admin->id])}}"><button type="button" class="btn btn-success">Sữa</button></a>|<a href="{{route('admin.xoa',['id'=>$admin->id])}}"><button type="button" class="btn btn-success">Xóa</button></a></td>
                @endif
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsAdmin->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsAdmin->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsAdmin->currentPage() - 1); $i <= min($dsAdmin->currentPage() + 1, $dsAdmin->lastPage()); $i++)
                <li class="page-item {{ $i == $dsAdmin->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsAdmin->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsAdmin->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsAdmin->nextPageUrl() }}" aria-label="Next">
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