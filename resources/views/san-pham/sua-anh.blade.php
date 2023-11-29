@extends('trangchu')
@section('content')
<form method="POST" action="" enctype="multipart/form-data">
 @csrf
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
            <div class="col-md-6">
                <!-- @foreach($ha as $hinhanh)
                <tr>
                    <td><img src="{{asset($hinhanh->url)}}" style="width:80px"/></td>
                </tr>
                @endforeach -->
                <tr>Chon Thêm Ảnh</tr>
                <input id="#" type="file" class="form-control" name="img[]" multiple >
            </div>
           
          </tr>
          <tr style=" display:grid">
                @foreach($ha as $HinhAnh)
                        <td><img src="{{asset($HinhAnh->url)}}" style="width:100px;height:100px"></td>
                        <td name="btn-xoa"><a href="{{ route('san-pham.xoa-anh', ['id' => $HinhAnh->id]) }}"><button type="button" class="btn btn-success">Xóa</button></a></td>
                 @endforeach
          </tr>
           
          </tbody>
          </div>
        </table>
        <button type="submit" class="btn btn-primary">
                Lưu
        </button>
<<<<<<< HEAD

=======
        <a href="{{ route('san-pham.cap-nhat',['id'=>$dsSanPham->id]) }}"><button type="button" class="btn btn-success">quay lại</button></a>
        </form>
>>>>>>> 2882480a5458ac1b7564664f7f0c1f2db64d541e
        </div>
        </form>
        @endsection
