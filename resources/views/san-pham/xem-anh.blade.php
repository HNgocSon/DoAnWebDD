@extends('trangchu')
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <h3>Danh sách hình ảnh</h3>
        
          <thead>
            <tr>
                <th>Hình Ảnh</th>
            </tr>
          </thead>
            <tbody>
            <tr>
                @foreach($ha as $HinhAnh)
          
                        <td><img src="{{asset($HinhAnh->url)}}" style="width:100px;height:100px"></td>
                  
                @endforeach
            </tr>
          </tbody>
        </table>
        @endsection
</div>
