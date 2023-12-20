@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h1>Danh Sách Bình Luận</h1>
        <form method="get" action="{{ route('binh-luan.danh-sach') }}">
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
                <th>Tên</th>
                <th>Tổng Đánh Giá<th>
                <th>Bình Luận</th>
                <th>Thời Gian</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dsCMT as $cmt)
            <tr>
                <td>{{ $cmt->khach_hang->ten }}</td>
                <td>{{ $cmt->tong_danh_gia}}</td>
                <td>{{ $cmt->comments }}</td>
                <td>{{ $cmt->thoi_gian}}</td>
            <tr>
            @endforeach
            </tbody>  
</table>
<div class="container mt-3">
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  @if ($dsCMT->currentPage() > 1)
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsCMT->previousPageUrl() }}" aria-label="Previous">
                              <span aria-hidden="true">&laquo; Previous</span>
                          </a>
                      </li>
                  @else
                      <li class="page-item disabled">
                          <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                      </li>
                  @endif

                  @for ($i = max(1, $dsCMT->currentPage() - 1); $i <= min($dsCMT->currentPage() + 1, $dsCMT->lastPage()); $i++)
                      <li class="page-item {{ $i == $dsCMT->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $dsCMT->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor

                  @if ($dsCMT->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsCMT->nextPageUrl() }}" aria-label="Next">
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