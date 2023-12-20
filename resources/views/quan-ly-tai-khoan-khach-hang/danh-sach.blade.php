@extends('trangchu')
@section('content')
      <div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
          <form action="{{route('khach-hang.search')}}" method="GET">
          <input type="text" name="query" placeholder="Search for products">
          <button type="submit">Search</button>
          </form>
        <h3>Tài Khoản Khách Hàng</h3>
        <form method="get" action="{{ route('khach-hang.danh-sach') }}">
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
                <th>Email</th>
                <th>Số Điện Thoại</th>
           
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsKhachHang as $KhachHang)
            <tr>
                <td>{{ $KhachHang->ten }}</td>
                <td>{{ $KhachHang->email }}</td>
                <td>{{ $KhachHang->sdt }}</td>
                <td><a href="{{ route('khach-hang.chi-tiet',['id'=>$KhachHang->id])}}"><button type="button" class="btn btn-success">xem chi tiet</button></a>|<a href="{{ route('khach-hang.xoa',['id'=>$KhachHang->id])}}"><button type="button" class="btn btn-success">xoa</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="container mt-3">
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  @if ($dsKhachHang->currentPage() > 1)
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsKhachHang->previousPageUrl() }}" aria-label="Previous">
                              <span aria-hidden="true">&laquo; Previous</span>
                          </a>
                      </li>
                  @else
                      <li class="page-item disabled">
                          <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                      </li>
                  @endif

                  @for ($i = max(1, $dsKhachHang->currentPage() - 1); $i <= min($dsKhachHang->currentPage() + 1, $dsKhachHang->lastPage()); $i++)
                      <li class="page-item {{ $i == $dsKhachHang->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $dsKhachHang->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor

                  @if ($dsKhachHang->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsKhachHang->nextPageUrl() }}" aria-label="Next">
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