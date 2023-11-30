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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$dsSanPham->ten}}" name="ten" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Loại Sản Phẩm') }}</label>
                                <div class="col-md-6">
                                <select name="ten_loai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>{{$dsSanPham->loai_san_pham->ten_loai}}</option>
                                @foreach ($dsLoaiSp as $LoaiSp)
                                <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Giá Sản Phẩm:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$dsSanPham->gia}}"  name="gia" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->mo_ta}}" type="text" class="form-control @error('name') is-invalid @enderror" name="mo_ta" required autofocus>

                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Số Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->so_luong}}" type="text" class="form-control @error('name') is-invalid @enderror" name="so_luong" required autofocus>

                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Màu:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->mau}}" type="text" class="form-control @error('name') is-invalid @enderror" name="mau" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Màn hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->man_hinh}}" type="text" class="form-control @error('name') is-invalid @enderror" name="man_hinh" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Camera:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->camera}}" type="text" class="form-control @error('name') is-invalid @enderror" name="camera" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ điều hành:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->he_dieu_hanh}}" type="text" class="form-control @error('name') is-invalid @enderror" name="he_dieu_hanh" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->chip}}" type="text" class="form-control @error('name') is-invalid @enderror" name="chip" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->ram}}" type="text" class="form-control @error('name') is-invalid @enderror" name="ram" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->dung_luong}}" type="text" class="form-control @error('name') is-invalid @enderror" name="dung_luong" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{$dsSanPham->pin}}" type="text" class="form-control @error('name') is-invalid @enderror" name="pin" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hình:') }}</label>
                                <div class="col-md-6">
                                <!-- @foreach($ha as $hinhanh)
                                <tr>
                                    <td><img src="{{asset($hinhanh->url)}}" style="width:80px"/></td>
                                </tr>
                                @endforeach -->
                                    <a href="{{ route('san-pham.cap-nhat-anh', ['id' => $dsSanPham->id]) }}"><button type="button" class="btn btn-success">Xem ảnh</button></a>
                                    <!-- <input id="name" type="file" class="form-control @error('name') is-invalid @enderror" name="img[]" multiple required autofocus > -->
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