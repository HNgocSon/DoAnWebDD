@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h3>Danh sách hình ảnh</h3>
          <thead>
             <th>Hình Ảnh</th>
          </thead>
            <tbody>
            <tr style="display: block;">
                @foreach($ha as $HinhAnh)
                        <td><img src="{{asset($HinhAnh->url)}}" style="width:100px;height:100px"></td>
                @endforeach
            </tr>
          </tbody>
        </table>
        <a href="{{ route('san-pham.danh-sach') }}"><button type="button" class="btn btn-success">quay lại</button></a>
        </div>
        
        @endsection

