@extends('trangchu')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm Mới Sản Phẩm') }}</div>
                    <div class="card-body"> 
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tên Sản Phẩm') }}</label>
                            <div class="col-md-8">            
                                <input id="ten" type="text" class="form-control @error('ten') @enderror  " name="ten" >
                                @error('ten')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>            
                        <div class="form-group row">
                            <label for="name" class="col-md-4">{{ __('Loại Sản Phẩm') }}</label>
                            <div class="col-md-8">
                                <select id="loai_san_pham" name="loai_san_pham" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option>Chọn Loại Sản Phẩm</option>
                                    @foreach ($dsLoaiSp as $LoaiSp)
                                    <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <h3>Biến Thể Sản Phẩm</h3>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Giá Sản Phẩm:') }}</label>
                                <div class="col-md-8">
                                    <input id="gia" type="text" class="form-control @error('gia') @enderror" name="gia" placeholder="Nhập Giá" >
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="mo_ta" class="col-md-4 col-form-label text-md-right">{{ __('Mô tả:') }}</label>
                                <div class="col-md-8">
                                    <input id="mo_ta" type="text" class="form-control @error('mo_ta') @enderror" name="mo_ta" placeholder="Nhập Mô Tả">                     
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màu:') }}</label>
                                <div class="col-md-8">
                                    <input id="mau" type="text" class="form-control @error('mau') @enderror" name="mau" placeholder="Nhập Màu">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Màn hình:') }}</label>
                                <div class="col-md-8">
                                    <input id="man_hinh" type="text" class="form-control @error('man_hinh') @enderror" name="man_hinh" placeholder="Nhập Màn Hình">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Camera:') }}</label>
                                <div class="col-md-8">
                                    <input id="camera" type="text" class="form-control @error('camera') @enderror" name="camera" placeholder="Nhập Camera">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hệ điều hành:') }}</label>
                                <div class="col-md-8">
                                    <input id="he_dieu_hanh" type="text" class="form-control @error('he_dieu_hanh') @enderror" name="he_dieu_hanh" placeholder="Nhập Hệ Điêu Hành">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chip:') }}</label>
                                <div class="col-md-8">
                                    <input id="chip" type="text" class="form-control @error('chip') @enderror" name="chip" placeholder="Nhập Chip">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ram:') }}</label>
                                <div class="col-md-8">
                                    <input id="ram" type="text" class="form-control @error('ram') @enderror" name="ram" placeholder="Nhập Ram">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Dung Lượng:') }}</label>
                                <div class="col-md-8">
                                    <input id="dung_luong" type="text" class="form-control @error('dung_luong') @enderror" name="dung_luong" placeholder="Nhập Dung Lượng">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pin:') }}</label>
                                <div class="col-md-8">
                                    <input id="pin" type="text" class="form-control @error('pin') @enderror   " name="pin" placeholder="Nhập Pin">
                                </div>
                            </div>



                                <div class="col-md-8 offset-md-12">
                                    <button class="btn btn-primary" type="button" id="btn-them">Thêm Sản Phẩm Biến Thể</button> 
                                </div>


                            <br> <br>
                        <div class="form-group row">
                            <div class="container mt-12">
                                <form method="POST" action="{{route('san-pham.xl-them-moi')}}" enctype="multipart/form-data">
                                    @csrf
                                    <table id="tb-ds-san-pham" border="1"  class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Giá</th>
                                                    <th>Mô Tả</th>
                                                    <th>Màu</th>
                                                    <th>Màn Hình</th>
                                                    <th>Camera</th>
                                                    <th>Hệ điều hành</th>
                                                    <th>Chip</th>
                                                    <th>Ram</th>
                                                    <th>Dung Lượng</th>
                                                    <th>Pin</th>
                                                </tr>
                                            </thead> 
                                            <tbody>

                                            </tbody>   
                                    </table>
                                    <input type="hidden" id="ten_san_pham" name="ten_san_pham" value=""/>
                                    <input type="hidden" id="loai_san_pham_id" name="loai_san_pham_id" value=""/>

                                    <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Hình:') }}</label>
                                        <div class="col-md-8">
                                            <input id="img" type="file" class="form-control @error('img') @enderror" name="img[]" multiple >
                                        </div>
                                    </div>

                                        <br/><br/>
                                        <button class="btn btn-primary" type ="submit">Lưu</button>
                                        <div class="form-group row">
                                            <div class="col-md-8 offset-md-12">
                                                <a href="{{route('hoa-don-nhap.danh-sach')}}" class="btn btn-primary">Quay lại</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </form>
                        </div>
                    </div>
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
            
            <td><a href="#" class="delete-link">Xoá</a></td>
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