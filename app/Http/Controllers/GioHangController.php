<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GioHang;
use App\Models\SanPhamBienThe;
class GioHangController extends Controller
{
    public function ThemSanPhamVaoGioHang(Request $request)
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
        }
        
         $sanPhamId = $request->san_pham;
         $bienTheId = $request->bien_the;
         $soLuong = $request->so_luong;

         if (!$sanPhamId || !$bienTheId || !$soLuong) {
            return response()->json(['error' => 'Dữ liệu đầu vào không hợp lệ'], 400);
        }

        $bienThe = SanPhamBienThe::find($bienTheId);
        if (!$bienThe) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $soLuongTonKho = $bienThe->so_luong;

        $tongSoLuongTrongGioHang = GioHang::where('khach_hang_id', $user->id)
        ->where('san_pham_bien_the_id', $bienTheId)
        ->sum('so_luong');

        if ($soLuong + $tongSoLuongTrongGioHang > $soLuongTonKho) {
            return response()->json(['error' => 'Tổng số lượng trong giỏ hàng vượt quá số lượng tồn kho'], 400);
        }

         $gioHang = GioHang::where('khach_hang_id', $user->id)
             ->where('san_pham_id', $sanPhamId)
             ->where('san_pham_bien_the_id', $bienTheId)
             ->first();
 

         if ($gioHang) {
             $gioHang->so_luong += $soLuong;
             $gioHang->save();
         } else {
            $gioHang = new GioHang();
            $gioHang->khach_hang_id = $user->id;
            $gioHang->san_pham_id = $sanPhamId; 
            $gioHang->san_pham_bien_the_id = $bienTheId;
            $gioHang->so_luong = $soLuong;
            $gioHang->save();
         }
 
         return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng']);
    }

    public function LayThongTinGioHang(Request $request)
    {
      
        $user = auth('api')->user();

        $dsGioHang = GioHang::with('san_pham', 'san_pham_bien_the')
            ->where('khach_hang_id', $user->id)
            ->get();

        return response()->json(['data' => $dsGioHang]);
    }

    public function XoaSanPhamKhoiGiohang(Request $request, $id)
    {
        $user = auth('api')->user();
    
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
        }
    
        $gioHangItem = GioHang::where('khach_hang_id', $user->id)
            ->where('id', $id)
            ->first();
    
        if (!$gioHangItem) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
        }
    
        try {
            $gioHangItem->delete();
            return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng', 'deleted_item' => $gioHangItem]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Có lỗi xảy ra trong quá trình xóa sản phẩm'], 500);
        }
    }
    
}
