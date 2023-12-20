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
          <form method="get" action="{{ route('nha-cung-cap.danh-sach') }}">
            <label for="Page">Số lượng dòng trên mỗi trang:</label>
            <select name="Page" id="Page" onchange="this.form.submit()">
                <option value="5" {{ $Page == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $Page == 10 ? 'selected' : '' }}>10</option>
                <option value="20" {{ $Page == 20 ? 'selected' : '' }}>20</option>
                <option value="50" {{ $Page == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ $Page == 100 ? 'selected' : '' }}>100</option>
           
            </select>
        </form>
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
        <div class="container mt-3">
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                  @if ($dsNCC->currentPage() > 1)
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsNCC->previousPageUrl() }}" aria-label="Previous">
                              <span aria-hidden="true">&laquo; Previous</span>
                          </a>
                      </li>
                  @else
                      <li class="page-item disabled">
                          <span class="page-link" aria-hidden="true">&laquo; Previous</span>
                      </li>
                  @endif

                  @for ($i = max(1, $dsNCC->currentPage() - 1); $i <= min($dsNCC->currentPage() + 1, $dsNCC->lastPage()); $i++)
                      <li class="page-item {{ $i == $dsNCC->currentPage() ? 'active' : '' }}">
                          <a class="page-link" href="{{ $dsNCC->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor

                  @if ($dsNCC->hasMorePages())
                      <li class="page-item">
                          <a class="page-link" href="{{ $dsNCC->nextPageUrl() }}" aria-label="Next">
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

