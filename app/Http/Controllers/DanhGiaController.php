<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
class DanhGiaController extends Controller
{
    public function ThemDanhGia(Request $request){

        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
        }

        $hoaDonId = $request->hoaDonId;
        $sanPhamId = $request->sanPhamId;
        $soSao = $request->soSao;
        $comments = $request->comments;


        $hoaDon = HoaDonXuat::find($hoaDonId);

        if (!$hoaDon) {
            return response()->json(['error' => 'Hóa đơn không tồn tại'], 404);
        }
        
        if ($hoaDon->status != 3) {
            return response()->json(['error' => 'Hóa đơn chưa được nhận hàng'], 401);
        }
        
        $danhGia = new DanhGia();
        $danhGia->khach_hang_id = $user->id;
        $danhGia->hoa_don_xuat_id = $request->hoaDon;
        $danhGia->san_pham_id = $request->sanPhamId;
        $danhGia->so_sao = $request->soSao;
        $danhGia->comments = $request->comments;
        $danhGia->save();

        return response()->json(['message' => 'Đánh Giá Thành Công']);

    }
}
