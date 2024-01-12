@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập nhật Sản Phẩm') }}</div>

                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Sản Phẩm') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('ten') is-invalid @enderror" value="{{$dsSanPham->ten}}" name="ten">
                                    @error('ten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Loại Sản Phẩm') }}</label>
                                <div class="col-md-6">
                                
                                <select name="ten_loai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected value="{{$dsSanPham->loai_san_pham_id}}" >{{$dsSanPham->loai_san_pham->ten_loai}}</option>
                                @foreach ($dsLoaiSp as $LoaiSp)
                                    @if($dsSanPham->loai_san_pham_id != $LoaiSp->id)
                                        <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai}}</option>
                                    @endif
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hình:') }}</label>
                                <div class="col-md-6">
                                     <a href="{{ route('san-pham.cap-nhat-anh', ['id' => $dsSanPham->id]) }}"><button type="button" class="btn btn-success">Xem ảnh</button></a>                     
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
                                    <a href="{{route('san-pham.danh-sach')}}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection