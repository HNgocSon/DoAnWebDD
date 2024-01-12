
@extends('trangchu')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm mới sản phẩm') }}</div>
                    <div class="card-body ">
                    <div class="form-group row">
                            <label for="ten" class="col-md-12 col-form-label text-md-right">{{ __('Tên Sản Phẩm') }}</label>
                            <div class="col-md-8 d-flex align-items-right">
                                <input id="ten" type="text" class="form-control @error('ten') @enderror" name="ten" placeholder="Nhập Tên Sản Phẩm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-12">{{ __('Loại Sản Phẩm') }}</label>
                            <div class="col-md-8">
                        
                                <select id="loai_san_pham" name="loai_san_pham" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option>Chọn Loại Sản Phẩm</option>
                                    @foreach ($dsLoaiSp as $LoaiSp)
                                    <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h3>Biến Thể Sản Phẩm</h3>
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
                                <label for="mo_ta" class="col-md-12 col-form-label text-md-right">{{ __('Mô tả:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mo_ta') @enderror" name="mo_ta" >
                                    @error('mo_ta')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Màu:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('mau') @enderror" name="mau" >
                                    @error('mau')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Màn hình:') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('man_hinh') @enderror" name="man_hinh" >
                                    @error('man_hinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Camera:') }}</label>

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
@section('page')
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-them").click(function(){
          
            var stt=$('#tb-ds-san-pham tbody tr').length+1;
            var Gia=$("#gia").val();
            var moTa=$("#mo_ta").val();
            var Mau=$("#mau").val();
            var manHinh=$("#man_hinh").val();
            var Camera=$("#camera").val();
            var heDieuHanh=$("#he_dieu_hanh").val();
            var Chip=$("#chip").val();
            var Ram=$("#ram").val();
            var dungLuong=$("#dung_luong").val();
            var Pin=$("#pin").val();

         
            var row=`<tr>
            <td>${stt}</td>
            <td>${Gia}<input type="hidden" name="gia[]" value="${Gia}"/></td>
            <td>${moTa}<input type="hidden" name ="mo_ta[]" value="${moTa}"/></td>
            <td>${Mau}<input type="hidden" name ="mau[]" value="${Mau}"/></td>
            <td>${manHinh}<input type="hidden" name ="man_hinh[]" value="${manHinh}"/></td>
            <td>${Camera}<input type="hidden" name ="camera[]" value="${Camera}"/></td>
            <td>${heDieuHanh}<input type="hidden" name ="he_dieu_hanh[]" value="${heDieuHanh}"/></td>
            <td>${Chip}<input type="hidden" name ="chip[]" value="${Chip}"/></td>
            <td>${Ram}<input type="hidden" name ="ram[]" value="${Ram}"/></td>
            <td>${dungLuong}<input type="hidden" name ="dung_luong[]" value="${dungLuong}"/></td>
            <td>${Pin}<input type="hidden" name ="pin[]" value="${Pin}"/></td>
            
            <td> <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a></td>

            </tr>`;

            $("#gia, #mo_ta, #mau, #man_hinh, #camera, #he_dieu_hanh, #chip, #ram, #dung_luong, #pin").val('');

            $("#tb-ds-san-pham").find('tbody').append(row);
            //xoa
            $("#tb-ds-san-pham").on("click", ".delete-link", function(e) {
            e.preventDefault();
            $(this).closest("tr").remove();
            // Cập nhật lại STT sau khi xóa
            $('#tb-ds-san-pham tbody tr').each(function(index) {
                $(this).find("td:first").text(index + 1);
            });
           
        });  
    
            // Chỉnh sửa dòng
        $("#tb-ds-san-pham").on("click", ".edit-link", function(e) {
            e.preventDefault();
            var tr = $(this).closest("tr");

            // Lưu trữ giá trị hiện tại
            var currentData = {
                soLuong: tr.find("td:eq(2)").text(),
                giaBan: tr.find("td:eq(3)").text(),
                giaNhap: tr.find("td:eq(12)").text(),
            };

            // Thay đổi dòng sang chế độ chỉnh sửa
            tr.find("td:eq(2)").html(`<input type="number" value="${currentData.soLuong}" class="so-luong-input-edit" />`);
            tr.find("td:eq(3)").html(`<input type="number" value="${currentData.giaBan}" class="gia-ban-input-edit" />`);
            tr.find("td:eq(12)").html(`<input type="number" value="${currentData.giaNhap}" class="gia-nhap-input-edit" />`);
            tr.find("td:last").html(`<a href="#" class="save-link">Lưu</a> | <a href="#" class="cancel-link">Hủy</a>`);
        });

        // Lưu chỉnh sửa
        $("#tb-ds-san-pham").on("click", ".save-link", function(e) {
            e.preventDefault();
            var tr = $(this).closest("tr");
            var newSoLuong = tr.find(".so-luong-input-edit").val();
            var newGiaBan = tr.find(".gia-ban-input-edit").val();
            var newGiaNhap = tr.find(".gia-nhap-input-edit").val();
            var newThanhTien = newSoLuong * newGiaNhap;

            tr.find("td:eq(2)").text(newSoLuong);
            tr.find("td:eq(3)").text(newGiaBan);
            tr.find("td:eq(12)").text(newGiaNhap);
            tr.find("td:eq(5)").text(newThanhTien);
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });

        // Hủy chỉnh sửa
        $("#tb-ds-san-pham").on("click", ".cancel-link", function(e) {
            e.preventDefault();
            var tr = $(this).closest("tr");

            tr.find("td:eq(2)").text(tr.find(".so-luong-input-edit").val());
            tr.find("td:eq(3)").text(tr.find(".gia-ban-input-edit").val());
            tr.find("td:eq(12)").text(tr.find(".gia-nhap-input-edit").val());
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });
    });

        $('#loai_san_pham').change(function(){
            $('#loai_san_pham_id').val(this.value);
        })

        $('#ten').change(function(){
            $('#ten_san_pham').val(this.value);
        })
        
    
});

</script>
@endsection
