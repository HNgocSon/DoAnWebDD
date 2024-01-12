@extends('trangchu')

@section('content')
<div class="table-responsive">

            <h1>THÊM HOÁ ĐƠN </h1>
            <label>Chọn nhà cung cấp</label>

            <select name="ncc" id="nha_cung_cap">
                <option>Chon nhà cung cấp</option>
                @foreach($dsNhaCungCap as $ncc)
                <option value="{{$ncc->id}}" > {{$ncc->ten}}</option>
                @endforeach
            </select>
            <br>
          
            <h3>DANH SÁCH SẢN PHẨM</h3>

            <label>Chọn Sản Phẩm</label>
            <select name="san_pham" id="san_pham">
                <option>Chon Sản Phẩm</option>
                @foreach($dsSanPham as $SP)
                <option value="{{$SP->id}}"> {{$SP->ten}}</option>
                @endforeach
            </select>

            <label>Số Lượng</label>
            <input type="number" id="so_luong" value="0"/>
            <label>Giá Bán</label>
            <input type="number" id="gia_ban" value="0"/>
            <label>Giá nhập</label>
            <input type="number" id="gia_nhap" value="0"/>

            <button type="button" id="btn-them">Thêm sản phẩm</button> 

            <br> </br>
    <form method="POST" action="{{route('hoa-don-nhap.xl-them-moi')}}">
        @csrf
        <table id="tb-ds-san-pham" border="1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Bán</th>
                        <th>Gia Nhap</th>
                        <th>Thành Tiền</th>
                        <th>Thao Tác</th>

                    </tr>
                </thead> 
                <tbody>

                </tbody>   
        </table>
            
        <input type="hidden" id="nha_cung_cap_id" name="nha_cung_cap_id" value=""/>
        
            <br/><br/>
            <button type ="submit">Lưu</button>
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <a href="{{route('hoa-don-nhap.danh-sach')}}" class="btn btn-primary">Quay lại</a>
                </div>
            </div>
</form>

@endsection

@section('page')
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-them").click(function(){
          
            var stt=$('#tb-ds-san-pham tbody tr').length+1;
            var tenSP=$("#san_pham").find(":selected").text();
            var idSP= $("#san_pham").find(":selected").val();
            var soLuong=$("#so_luong").val();
            var giaBan=$("#gia_ban").val();
            var giaNhap=$("#gia_nhap").val();
            var thanhTien = soLuong * giaNhap;
         
            var row=`<tr>
            <td>${stt}</td>
            <td>${tenSP}<input type="hidden" name ="idSP[]" value="${idSP}"/></td>
            <td>${soLuong}<input type="hidden" name ="soLuong[]" value="${soLuong}"/></td>
            <td>${giaBan}<input type="hidden" name ="giaBan[]" value="${giaBan}"/></td>
            <td>${giaNhap}<input type="hidden" name ="giaNhap[]" value="${giaNhap}"/></td>
            <td>${thanhTien}<input type="hidden" name ="thanhTien[]" value="${thanhTien}"/></td>
            
            <td> <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a></td>

            </tr>`;


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
                giaNhap: tr.find("td:eq(4)").text(),
            };

            // Thay đổi dòng sang chế độ chỉnh sửa
            tr.find("td:eq(2)").html(`<input type="number" value="${currentData.soLuong}" class="so-luong-input-edit" />`);
            tr.find("td:eq(3)").html(`<input type="number" value="${currentData.giaBan}" class="gia-ban-input-edit" />`);
            tr.find("td:eq(4)").html(`<input type="number" value="${currentData.giaNhap}" class="gia-nhap-input-edit" />`);
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
            tr.find("td:eq(4)").text(newGiaNhap);
            tr.find("td:eq(5)").text(newThanhTien);
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });

        // Hủy chỉnh sửa
        $("#tb-ds-san-pham").on("click", ".cancel-link", function(e) {
            e.preventDefault();
            var tr = $(this).closest("tr");

            tr.find("td:eq(2)").text(tr.find(".so-luong-input-edit").val());
            tr.find("td:eq(3)").text(tr.find(".gia-ban-input-edit").val());
            tr.find("td:eq(4)").text(tr.find(".gia-nhap-input-edit").val());
            tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
        });
    });
        $('#nha_cung_cap').change(function(){
            // var nhacungcap=$(this).val();
            $('#nha_cung_cap_id').val(this.value);
        })
    
});

</script>
@endsection