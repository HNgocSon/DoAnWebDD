 
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
        <form method="POST" action="{{route('xuly-hd-nhap.them-moi')}}" >
            @csrf
            <h1>THÊM HOÁ ĐƠN NHẬP </h1>
            <select name="ten_ncc" id="nha_cung_cap_id">
            <option selected>Chọn Nhà Cung Cấp</option>
                    @foreach($dsNCC as $ncc)
                    <option value="{{$ncc->id}}"> {{$ncc->ten}}</option>
                    @endforeach
            </select>
            <div class="col-md-6">
                <label for="ten" class="form-label">Ngày nhập:</label>
                    <input type="date" name="Ngay_nhap" id="Ngay_nhap" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
            <label>Tổng Tiền</label>
            <input type="number" id="tong_tien" name="tong_tien" />
           
       
            <button type="button" class="btn btn-success" id="btn-them">Thêm Vào Danh Sách</button> 

            <br> </br>

        <table id="tb-ds" border="1">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nhà Cung Cấp</th>
                        <th>Ngày nhập</th>
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
            var tenNCC=$("#nha_cung_cap_id").find(":selected").text();
            var idNCC=$("#nha_cung_cap_id").find(":selected").val();
            var NgayNhap=$("#Ngay_nhap").val();
            var TongTien=$("#tong_tien").val();
           
            //tạo 1 dòng    
            var row=`<tr>
            <td>${stt}</td>
            <td>${tenNCC}<input type="hidden" name ="idNCC[]" value="${tenNCC}"/></td>
            <td>${NgayNhap}<input type="hidden" name ="NgayNhap[]" value="${NgayNhap}"/></td>
            <td>${TongTien}<input type="hidden" name ="TongTien[]" value="${TongTien}"/></td>
            
            <td> <a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a></td>
          

            </tr>`;
            // theem cuoi tab

            $("#tb-ds").find('tbody').append(row);

            //xoa
            $("#tb-ds").on("click", ".delete-link", function(e) {
            e.preventDefault();
            $(this).closest("tr").remove();
            // Cập nhật lại STT sau khi xóa
            $('#tb-ds tbody tr').each(function(index) {
                $(this).find("td:first").text(index + 1);
            });
        
        });
      
        // Chỉnh sửa dòng
    $("#tb-ds").on("click", ".edit-link", function(e) {
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
    $("#tb-ds").on("click", ".save-link", function(e) {
        e.preventDefault();
        var tr = $(this).closest("tr");
        var newTongTien = tr.find(".tong-tien-input-edit").val();
        

        tr.find("td:eq(3)").text(newTongTien);
        tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
    });

    // Hủy chỉnh sửa
    $("#tb-ds").on("click", ".cancel-link", function(e) {
        e.preventDefault();
        var tr = $(this).closest("tr");


        tr.find("td:eq(3)").text(tr.find(".tong-tien-input-edit").val());
        tr.find("td:last").html(`<a href="#" class="edit-link">Sửa</a> | <a href="#" class="delete-link">Xoá</a>`);
    });
    });
});
    

</script>
@endsection
