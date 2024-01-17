@extends('trangchu')
@section('content')
      <div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <div>
            <a href="{{route('hoa-don-nhap.them-moi')}}"><button type="submit" class="btn btn-info">Thêm mới</button></a>
        </div>
        <form class="form-inline" action="{{ route('hoa-don-nhap.search') }}" method="GET">
            <div class="input-group" >
                <input type="text" class="form-control" style="max-width: 400px;" name="query" placeholder="Search for products">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <h3>Hóa Đơn Nhập</h3>
        <form class="form-inline" method="get" action="{{ route('hoa-don-nhap.danh-sach') }}">
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
            <tr>
                <th>Nhà Cung Cấp</td>
                <th>Ngày Nhập</th>
                <th>Tổng Tiền</th>
           
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsHoaDonNhap as $HoaDon)
            <tr>
                <td>{{ $HoaDon->nha_cung_cap->ten }}</td>
                <td>{{ $HoaDon->ngay_nhap }}</td>
                <td>{{ $HoaDon->tong_tien }}</td>
                <td><a href="{{ route('hoa-don-nhap.chi-tiet-hoa-don-nhap', ['id' => $HoaDon->id]) }}"><button type="button" class="btn btn-success">Xem Chi Tiết</button></a>|<a href="{{ route('hoa-don-nhap.xoa', ['id' => $HoaDon->id]) }}"><button type="button" class="btn btn-danger">Xóa</button></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsHoaDonNhap->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsHoaDonNhap->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsHoaDonNhap->currentPage() - 1); $i <= min($dsHoaDonNhap->currentPage() + 1, $dsHoaDonNhap->lastPage()); $i++)
                <li class="page-item {{ $i == $dsHoaDonNhap->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsHoaDonNhap->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsHoaDonNhap->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsHoaDonNhap->nextPageUrl() }}" aria-label="Next">
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