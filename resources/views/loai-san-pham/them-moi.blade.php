@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm mới loại sản phẩm') }}</div>

                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Loại sản phẩm') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('ten_loai') @enderror " name="ten_loai" >
                                    @error('ten_loai')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hình:') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control @error('hinh') @enderror" name="img"   >
                                    @error('hinh')
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
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{route('loai-san-pham.danh-sach')}}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection