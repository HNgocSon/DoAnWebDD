
@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm Mới Sản Phẩm') }}</div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                        @csrf   
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Sản Phẩm') }}</label>
                                <div class="col-md-6">
<<<<<<< HEAD
                                    <input id="name" type="text" class="form-control " name="ten">

=======
                                    <input id="name" type="text" class="form-control @error('ten') @enderror  " name="ten" >
                                    @error('ten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
>>>>>>> 2882480a5458ac1b7564664f7f0c1f2db64d541e
                                </div>
                              
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Loại Sản Phẩm') }}</label>
                                <div class="col-md-6">
                                <select name="ten_loai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    
                                @foreach ($dsLoaiSp as $LoaiSp)
                                <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Giá Sản Phẩm:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('gia') @enderror" name="gia" >
                                    @error('gia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mo_ta') @enderror" name="mo_ta" >
                                    @error('mo_ta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Số Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('so_luong') @enderror" name="so_luong" >
                                    @error('so_luong')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màu:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mau') @enderror" name="mau" >
                                    @error('mau')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màn hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('man_hinh') @enderror" name="man_hinh" >
                                    @error('man_hinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Camera:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('camera') @enderror" name="camera" >
                                    @error('camera')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ điều hành:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('he_dieu_hanh') @enderror" name="he_dieu_hanh" >
                                    @error('he_dieu_hanh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('chip') @enderror" name="chip" >
                                    @error('chip')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('ram') @enderror" name="ram" >
                                    @error('ram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('dung_luong') @enderror" name="dung_luong" >
                                    @error('dung_luong')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('pin') @enderror   " name="pin" >
                                    @error('pin')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control @error('hinh') @enderror   " name="img[]" multiple  >
                                    @error('hinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
