@extends('trangchu')
@section('content')
<form method="POST" action="">
@csrf
        <table border=0>
        <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Tên Nhà Cung Cấp</label>
        <input type="text" name="ten" value="{{$dsNCC->ten}}" class="form-control" id="formGroupExampleInput" placeholder="Nhập Tên Nhà Cung Cấp">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Số Điện Thoại</label>
        <input type="text" name="sdt" value="{{$dsNCC->sdt}}" class="form-control" id="formGroupExampleInput2" placeholder="Nhập số điện thoại">
        </div>  
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Địa Chỉ</label>
        <input type="text" name="dia_chi" value="{{$dsNCC->dia_chi}}"  class="form-control" id="formGroupExampleInput2" placeholder="Nhập địa chỉ">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Lưu</button>
        </div>    
    </table>
</form>
@endsection