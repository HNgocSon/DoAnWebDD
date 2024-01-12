@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập nhật Biến Thể') }}</div>

                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Giá Sản Phẩm:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('gia') is-invalid @enderror" value="{{$dsBienThe->gia}}"  name="gia">
                                    @error('gia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->mo_ta}}" type="text" class="form-control @error('mo_ta') is-invalid @enderror" name="mo_ta" >
                                    @error('mo_ta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Màu:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->mau}}" type="text" class="form-control @error('mau') is-invalid @enderror" name="mau" >
                                    @error('mau')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Màn hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->man_hinh}}" type="text" class="form-control @error('man_hinh') is-invalid @enderror" name="man_hinh" >
                                    @error('man_hinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Camera:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->camera}}" type="text" class="form-control @error('camera') is-invalid @enderror" name="camera" >
                                    @error('camera')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ điều hành:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->he_dieu_hanh}}" type="text" class="form-control @error('he_dieu_hanh') is-invalid @enderror" name="he_dieu_hanh" >
                                    @error('he_dieu_hanh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->chip}}" type="text" class="form-control @error('chip') is-invalid @enderror" name="chip" >
                                    @error('chip')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->ram}}" type="text" class="form-control @error('ram') is-invalid @enderror" name="ram" >
                                    @error('ram')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->dung_luong}}" type="text" class="form-control @error('dung_luong') is-invalid @enderror" name="dung_luong" >
                                    @error('dung_luong')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsBienThe->pin}}" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" >
                                    @error('pin')
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
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                <a href="{{ route('san-pham.bien-the',['id'=>$dsBienThe->san_pham_id]) }}"><button type="button" class="btn btn-success">quay lại</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection