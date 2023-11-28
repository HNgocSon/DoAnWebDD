@extends('trangchu')
<form method='POST' action="">
    @csrf
    <table border=0>
        <tr>
            <th>Loại Sản Phẩm</th>
            <td><input type="text" name="loai_sp" value="{{$dsLoaiSp->loai_sp}}"/></td>
        </tr>
        <tr>
            <th>Trạng Thái</th>
            <td><input type="text" name="trang_thai" value="{{$dsLoaiSp->trang_thai}}"/></td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-success">Lưu</button></td>
        </tr>
    </table>
</form>