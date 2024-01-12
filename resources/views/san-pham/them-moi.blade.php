
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
                        <script>
                            function showErrorMessage(fieldName) {
                                var errorMessage = document.getElementById(fieldName + "-error");
                                errorMessage.textContent = "Vui lòng nhập thông tin này";
                            }
                            function clearErrorMessage(fieldName) {
                                var errorMessage = document.getElementById(fieldName + "-error");
                                errorMessage.textContent = "";
                            }

                        </script>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Sản Phẩm') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') @enderror" name="ten" onfocus="showErrorMessage('name')" oninput="clearErrorMessage('name')">
                            <span id="name-error" class="text-danger"></span>
                        </div>
                    </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Loại Sản Phẩm') }}</label>
                                <div class="col-md-6">
                                <select name="ten_loai" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <!-- <option>Chon Loai</option> -->
                                @foreach ($dsLoaiSp as $LoaiSp)
                                <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gia" class="col-md-4 col-form-label text-md-right">{{ __('Giá Sản Phẩm:') }}</label>
                                <div class="col-md-6">
                                    <input id="gia" type="text" class="form-control @error('gia') @enderror" name="gia" onfocus="showErrorMessage('gia')" oninput="clearErrorMessage('gia')">
                                    <span id="gia-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mo_ta') @enderror" name="mo_ta" onfocus="showErrorMessage('mota')" oninput="clearErrorMessage('mota')">
                                    <span id="mota-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màu:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mau') @enderror" name="mau" onfocus="showErrorMessage('mau')" oninput="clearErrorMessage('mau')">
                                    <span id="mau-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màn hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('man_hinh') @enderror" name="man_hinh" onfocus="showErrorMessage('manhinh')" oninput="clearErrorMessage('manhinh')">
                                    <span id="manhinh-error" class="text-danger"></span>
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Camera:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('camera') @enderror" name="camera" onfocus="showErrorMessage('camera')" oninput="clearErrorMessage('camera')">
                                    <span id="camera-error" class="text-danger"></span>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ điều hành:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('he_dieu_hanh') @enderror" name="he_dieu_hanh" onfocus="showErrorMessage('hedieuhanh')" oninput="clearErrorMessage('hedieuhanh')">
                                    <span id="hedieuhanh-error" class="text-danger"></span>
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('chip') @enderror" name="chip" onfocus="showErrorMessage('chip')" oninput="clearErrorMessage('chip')">
                                    <span id="chip-error" class="text-danger"></span>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('ram') @enderror" name="ram" onfocus="showErrorMessage('ram')" oninput="clearErrorMessage('ram')">
                                    <span id="ram-error" class="text-danger"></span>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('dung_luong') @enderror" name="dung_luong" onfocus="showErrorMessage('dungluong')" oninput="clearErrorMessage('dungluong')">
                                    <span id="dungluong-error" class="text-danger"></span>
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('pin') @enderror" name="pin" onfocus="showErrorMessage('pin')" oninput="clearErrorMessage('pin')">
                                    <span id="pin-error" class="text-danger"></span>
                                  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hình:') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control @error('hinh') @enderror   " name="img[]" multiple  >
                                   
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
