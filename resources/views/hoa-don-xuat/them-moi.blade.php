 
<style>
    #tb-ds-san-pham th {
        padding: 10px; /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <th> */
        text-align: center; /* Căn giữa nội dung bên trong thẻ <th> */
    }

    #tb-ds-san-pham td {
        padding: 10px; /* Thêm khoảng trống 10px vào mỗi bên trong thẻ <td> */
    }
</style>
@extends('trangchu')
@section('content')


<div class="table-responsive">
        <table class="table table-striped table-sm" border="1">
        <form method="POST" action="{{route('xuly.them-moi')}}" >
            @csrf
            <h1>THÊM HOÁ ĐƠN </h1>
            <select name="ten_sp" id="san_pham_id">
            <option selected>Chọn Sản Phẩm</option>
                    @foreach($dsSanPham as $sanPham)
                    <option value="{{$sanPham->id}}"> {{$sanPham->ten}}</option>
                    @endforeach
            </select>
            <select name="khach_hang" id="khach_hang_id">
            <option selected>Chọn Khách Hàng</option>
                    @foreach($dsKhachHang as $khachHang)
                    <option value="{{$khachHang->id}}"> {{$khachHang->ten}}</option>
                    @endforeach
            </select>
            <div class="col-md-6">
                <label for="ten" class="form-label">Ngày tạo:</label>
                    <input type="date" name="Ngay_tao" id="ngay_tao" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
            <label>tổng tiền</label>
            <input type="number" id="tong_tien" name="tong_tien" />
           
       
            <button type="button" class="btn btn-success" id="btn-them">Thêm Vào Danh Sách</button> 

            <br> </br>

        <table id="tb-ds-san-pham" border="1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản Phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Khách hàng</th>
                        <th>tổng tiền</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead> 
                <tbody>

                </tbody>   
        </table>
            

            <br/><br/>
            <button type ="submit" class="btn btn-success">Lưu</button>

        </table>
</div>
</form>
@endsection   


@section('page')
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-them").click(function(){
            var stt=$('#tb-ds-san-pham tbody tr').length+1;
            var tenSp=$("#san_pham_id").find(":selected").text();
            var idSP=$("#san_pham_id").find(":selected").val();
            var tenKh=$("#khach_hang_id").find(":selected").text();
            var idKH=$("#khach_hang_id").find(":selected").val();
            var Ngay_tao=$("#ngay_tao").val();
            var TongTien=$("#tong_tien").val();
           
            //tạo 1 dòng    
            var row=`<tr>
            <td>${stt}</td>
            <td>${tenSp}<input type="hidden" name ="idSP[]" value="${tenSp}"/></td>
            <td>${Ngay_tao}<input type="hidden" name ="Ngay_tao[]" value="${Ngay_tao}"/></td>
            <td>${tenKh}<input type="hidden" name ="tenKh[]" value="${tenKh}"/></td>
            <td>${TongTien}<input type="hidden" name ="TongTien[]" value="${TongTien}"/></td>
            
            <td> <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a></td>
          

            </tr>`;
            // theem cuoi tab

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
            TongTien: tr.find("td:eq(3)").text()
        };

        // Thay đổi dòng sang chế độ chỉnh sửa
        tr.find("td:eq(3)").html(`<input type="number" value="${currentData.TongTien}" class="tong-tien-input-edit" />`);
        tr.find("td:last").html(`<a href="#" class="save-link">Lưu</a> | <a href="#" class="cancel-link">Hủy</a>`);
    });

    // Lưu chỉnh sửa
    $("#tb-ds-san-pham").on("click", ".save-link", function(e) {
        e.preventDefault();
        var tr = $(this).closest("tr");
        var newTongTien = tr.find(".tong-tien-input-edit").val();
        

        tr.find("td:eq(3)").text(newTongTien);
        tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
    });

    // Hủy chỉnh sửa
    $("#tb-ds-san-pham").on("click", ".cancel-link", function(e) {
        e.preventDefault();
        var tr = $(this).closest("tr");


        tr.find("td:eq(3)").text(tr.find(".tong-tien-input-edit").val());
        tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
    });
    });
});
    

    </script>
@endsection
