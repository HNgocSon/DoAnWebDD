@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm mới Biến Thể') }}</div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="san_pham_id" value="{{ $dsSanPham->id }}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Giá') }}</label>
                                <div class="col-md-6">
                                    <input id="gia" type="text" class="form-control  @error('ten_loai') @enderror " name="gia" >
                                    @error('gia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả') }}</label>
                                <div class="col-md-6">
                                    <input id="mo_ta" type="text" class="form-control  @error('ten_loai') @enderror " name="mo_ta" >
                                    @error('mo_ta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màu') }}</label>
                                <div class="col-md-6">
                                    <input id="mau" type="text" class="form-control  @error('ten_loai') @enderror " name="mau" >
                                    @error('mau')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màn Hình') }}</label>
                                <div class="col-md-6">
                                    <input id="man_hinh" type="text" class="form-control  @error('ten_loai') @enderror " name="man_hinh" >
                                    @error('man_hinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Camera') }}</label>
                                <div class="col-md-6">
                                    <input id="camera" type="text" class="form-control  @error('ten_loai') @enderror " name="camera" >
                                    @error('camera')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ Điều Hành') }}</label>
                                <div class="col-md-6">
                                    <input id="he_dieu_hanh" type="text" class="form-control  @error('ten_loai') @enderror " name="he_dieu_hanh" >
                                    @error('he_dieu_hanh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip') }}</label>
                                <div class="col-md-6">
                                    <input id="chip" type="text" class="form-control  @error('ten_loai') @enderror " name="chip" >
                                    @error('chip')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram') }}</label>
                                <div class="col-md-6">
                                    <input id="ram" type="text" class="form-control  @error('ten_loai') @enderror " name="ram" >
                                    @error('ram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng') }}</label>
                                <div class="col-md-6">
                                    <input id="dung_luong" type="text" class="form-control  @error('ten_loai') @enderror " name="dung_luong" >
                                    @error('dung_luong')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin') }}</label>
                                <div class="col-md-6">
                                    <input id="pin" type="text" class="form-control  @error('ten_loai') @enderror " name="pin" >
                                    @error('pin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>                    
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Lưu') }}
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