@extends('master')
@section('content')
<form method="POST" action="">
@csrf
<table border=0>
        <div class="mb-3">
                <label class="form-label">Tên Loại Sản Phẩm</label>
                <input type="text" class="form-control" id="price" name="ten_loai" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Lưu</button>
   
    </table>
</form>
@endsection