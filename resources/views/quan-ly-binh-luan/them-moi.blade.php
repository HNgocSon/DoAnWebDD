@extends('trangchu')
@section('content')
<form method="POST" action="">
@csrf
<table border=0>
        <th>Viết đánh giá</th>
        <tr>
            <th>Tên Khách Hàng</th>
            <td><input type="text" name="khach_hang"/></td>
        </tr>
        <tr>
            <th>Comments</th>
            <td><input type="text" name="comments"/></td>
        </tr>
        <tr>
            <th>Đánh Giá</th>
            <td><select class="form-select" name="danh_gia" aria-label="Default select example">
                <option selected>Chọn đánh giá</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
            </select></td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit">Lưu</button></td>
        </tr>
    </table>
</form>
@endsection