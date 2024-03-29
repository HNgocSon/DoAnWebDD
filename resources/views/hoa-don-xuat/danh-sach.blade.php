@extends('trangchu')
@section('content')
      <div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h3>Hóa Đơn Xuất</h3>
    <form class="form-inline" method="get" action="{{ route('hoa-don-xuat.danh-sach') }}">
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
                <th>Khách Hàng</th>
                <th>Ngày Tạo</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
          </thead>
            <tbody>
            @foreach($dsHoaDonXuat as $hoaDon)
            <tr>
                <td>{{ $hoaDon->khach_hang->ten}}</td>
                <td>{{ $hoaDon->ngay_xuat }}</td>
                <td>{{ $hoaDon->tong_tien }}</td>
                @if($hoaDon->status == 1)
                    <td>Đã Xác Nhận</td>
                @elseif($hoaDon->status == 2)
                    <td>Đang Giao</td>
                @elseif ($hoaDon->status == 3)
                    <td>Đã Giao Hàng Thành Công</td>
                @elseif($hoaDon->status == 4)
                    <td>Đã Hủy</td>
                @else
                    <td>Chờ Duyệt</td> 
                @endif
                <td>
                @if($hoaDon->status !== 4 )
                        @if($hoaDon->status !== 3 )
                            <form method="post" action="{{ route('hoa-don-xuat.thay-doi-trang-thai', ['id' => $hoaDon->id]) }}">
                                @csrf
                                @method('put')
                                <select name="trangthai" onchange="this.form.submit()">
                                    <option>Thay Đổi Trạng Thái đơn</option>
                                    <option value="1" {{ $hoaDon->status == 1 ? 'selected' : '' }}>Xác Nhận</option>
                                    <option value="2" {{ $hoaDon->status == 2 ? 'selected' : '' }}>Đang Giao</option>
                                    <option value="3" {{ $hoaDon->status == 3 ? 'selected' : '' }}>Đã Giao</option>
                                    <option value="4" {{ $hoaDon->status == 4 ? 'selected' : '' }}>Hủy Đơn</option>
                                </select>
                            </form>
                        @else
                        <label for="">Đã Giao Hàng Thành Công</label>    
                        @endif
                @else
                <label for="">Đã Hủy Đơn Hàng</label>
                @endif
                </td>
                <td> <a href="{{route('hoa-don-xuat.chi-tiet',['id'=>$hoaDon->id])}}"><button type="submit" class="btn btn-success">Chi Tiết</button></a> | <a href="{{route('hoa-don-xuat.xoa',['id'=>$hoaDon->id])}}"><button type="submit" class="btn btn-success">Xóa Đơn</button></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
        <div class="container mt-3">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($dsHoaDonXuat->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $dsHoaDonXuat->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                </li>
            @endif

            @for ($i = max(1, $dsHoaDonXuat->currentPage() - 1); $i <= min($dsHoaDonXuat->currentPage() + 1, $dsHoaDonXuat->lastPage()); $i++)
                <li class="page-item {{ $i == $dsHoaDonXuat->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $dsHoaDonXuat->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($dsHoaDonXuat->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $dsHoaDonXuat->nextPageUrl() }}" aria-label="Next">
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