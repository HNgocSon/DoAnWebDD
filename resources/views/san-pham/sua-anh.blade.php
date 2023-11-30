@extends('trangchu')
@section('content')
<div class="table-responsive">
<form method="POST" action="" enctype="multipart/form-data">
 @CSRF
        <table class="table table-striped table-sm" border="1">
        <h3>Danh sách hình ảnh</h3>
        
          <thead>
            <tr>
                <th>Hình Ảnh</th>
            </tr>
          </thead>
          <tbody>
          
          <tr>
            <div class="col-md-6">
                <!-- @foreach($ha as $hinhanh)
                <tr>
                    <td><img src="{{asset($hinhanh->url)}}" style="width:80px"/></td>
                </tr>
                @endforeach -->
                <tr>Chon Thêm Ảnh</tr>
                <input id="#" type="file" class="form-control" name="img[]" multiple >
            </div>
            <button type="submit" class="btn btn-primary">
                Lưu
          </button>
            
          </tr>
            <tr>
                @foreach($ha as $HinhAnh)
                        <td><img src="{{asset($HinhAnh->url)}}" style="width:100px;height:100px"></td>
                        <td><a href="{{ route('san-pham.xoa-anh', ['id' => $HinhAnh->id]) }}"><button type="button" class="btn btn-success">Xóa</button></a></td>
                @endforeach
            </tr>
          </tbody>
        </table>
       
        <a href="{{ route('san-pham.cap-nhat',['id'=>$dsSanPham->id]) }}"><button type="button" class="btn btn-success">quay lại</button></a>
        </form>
        </div>
        @endsection
