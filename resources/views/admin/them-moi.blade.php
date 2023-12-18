@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Mới Tài Khoản Quản Lý</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Tên Quan Lý</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('ten_loai') @enderror " name="ten" >    
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">Tên Đăng Nhập </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('ten_loai') @enderror " name="ten_dang_nhap" >                                 
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">Mật Khẩu</label>
                                <div class="col-md-6">
                                    <input id="name" type="password" class="form-control  @error('ten_loai') @enderror " name="password" >
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">chọn quyền</label>
                                <div class="col-md-6">

                                <select name="quyen" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    @foreach ($dsQuyen as $quyen)
                                    <option value="{{ $quyen->id }}">{{ $quyen->ten_quyen }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Lưu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection