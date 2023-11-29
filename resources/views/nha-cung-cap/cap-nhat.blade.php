@extends('master')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cập Nhật Nhà Cung Cấp') }}</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Nhà Cung Cấp') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('ten') @enderror  " value="{{$dsNCC->ten}}" name="ten" >
                                    @error('ten')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('sdt') @enderror " value="{{$dsNCC->sdt}}" name="sdt" >
                                    @error('sdt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Địa Chỉ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('dia_chi') @enderror " value="{{$dsNCC->dia_chi}}" name="dia_chi" >
                                    @error('dia_chi')
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