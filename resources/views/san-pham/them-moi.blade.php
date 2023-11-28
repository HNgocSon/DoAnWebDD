@extends('trangchu')
@section('content')
<form method='POST' action="" enctype="multipart/form-data">  
    @csrf
    <table border=0>
        <tr>
            <th>Tên SP</th>
            <td><input type="text" name="ten"/></td>
        </tr>
        <tr>
            <th>Loại Sản Phẩm</th>
            <td> <select name="loai_sp" id="" >
                <option selected>Chọn loại</option>
                @foreach ($dsLoaiSp as $LoaiSp)
                <option value="{{ $LoaiSp->id }}">{{ $LoaiSp->ten_loai }}</option>
                @endforeach
                </select>  
            </td>   
        </tr>
        <div class="mb-3">
                <label for="price" class="form-label">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="price" name="gia" required>
        </div>
        <tr>
            <th>Mô tả</th>
            <td><input type="text" name="mo_ta"/></td>
        </tr>
        
            <th>Số lượng</th>
            <td>
            <input type="text"  name="so_luong"> 
            </td>
        </tr>
        <tr>
            <th>Màu</th>
            <td><input type="text" name="mau"/></td>
        </tr>
        <tr>
            <th>Màn Hình</th>
            <td><input type="text" name="man_hinh"/></td>
        </tr>

        <tr>
            <th>Camera</th>
            <td><input type="text" name="camera"/></td>
        </tr>
        <tr>
            <th>Hệ điều hành</th>
            <td><input type="text" name="he_dieu_hanh"/></td>
        </tr>
        <tr>
            <th>Chip</th>
            <td><input type="text" name="chip"/></td>
        </tr>
        <tr>
            <th>Ram</th>
            <td><input type="text" name="ram"/></td>
        </tr>
        <tr>
            <th>Dung Lượng</th>
            <td><input type="text" name="dung_luong"/></td>
        </tr>
        <tr>
            <th>Pin</th>
            <td><input type="text" name="pin"/></td>
        </tr>
        <tr>
            <th>Hình Ảnh</th>
            <td><input type="file" name="img[]" multiple/></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button></td>
        </tr>
    </table>
</form>
@endsection

