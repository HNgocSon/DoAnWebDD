<form method='POST' action="" enctype="multipart/form-data">
    @csrf
    <table border=0>
        <tr>
            <th>Tên SP</th>
            <td><input type="text" name="ten" value="{{$dsSanPham->ten}}"/></td>
        </tr>
        <tr>
            <th>Loại Sản Phẩm</th>
            <td> <select name="loai_sp" id="" >
                <option selected>{{$dsSanPham->loai_san_pham->ten_loai}}</option>
                @foreach ($dsLoaiSp as $LoaiSp)
                <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                @endforeach
                </select>  
            </td>   
        </tr>
        <tr>
            <th>Giá</th>
            <td><input type="text" name="gia" value="{{$dsSanPham->gia}}"/></td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><input type="text" name="mo_ta" value="{{$dsSanPham->mo_ta}}"/></td>
        </tr>
        
            <th>Số lượng</th>
            <td>
            <input type="text"  name="so_luong" value="{{$dsSanPham->so_luong}}"> 
            </td>
        </tr>
        <tr>
            <th>Màu</th>
            <td><input type="text" name="mau" value="{{$dsSanPham->mau}}"/></td>
        </tr>
        <tr>
            <th>Màn Hình</th>
            <td><input type="text" name="man_hinh" value="{{$dsSanPham->man_hinh}}"/></td>
        </tr>

        <tr>
            <th>Camera</th>
            <td><input type="text" name="camera" value="{{$dsSanPham->camera}}"/></td>
        </tr>
        <tr>
            <th>Hệ điều hành</th>
            <td><input type="text" name="he_dieu_hanh" value="{{$dsSanPham->he_dieu_hanh}}"/></td>
        </tr>
        <tr>
            <th>Chip</th>
            <td><input type="text" name="chip" value="{{$dsSanPham->chip}}"/></td>
        </tr>
        <tr>
            <th>Ram</th>
            <td><input type="text" name="ram" value="{{$dsSanPham->ram}}"/></td>
        </tr>
        <tr>
            <th>Dung Lượng</th>
            <td><input type="text" name="dung_luong" value="{{$dsSanPham->dung_luong}}"/></td>
        </tr>
        <tr>
            <th>Pin</th>
            <td><input type="text" name="pin" value="{{$dsSanPham->pin}}"/></td>
        </tr>
        </tr>
        @foreach($ha as $hinhanh)
        <tr>
            <th>Hình Ảnh</th>
            <td><img src="{{asset($hinhanh->url)}}" style="width:80px"/></td>
            
        </tr>
        @endforeach
       
        <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" class="form-control-file" name="image">
        </div>
        <tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button></td>
        </tr>
    </table>
</form>