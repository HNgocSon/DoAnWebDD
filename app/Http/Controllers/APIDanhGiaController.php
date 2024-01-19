<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Models\HoaDonXuat;

class APIDanhGiaController extends Controller
{
    public function ThemDanhGia(Request $request){

        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' => false, 'error' => 'Người dùng chưa đăng nhập'], 401);
        }

        $hoaDonId = $request->hoaDonId;
        $sanPhamId = $request->sanPhamId;
        $soSao = $request->soSao;
        $comments = $request->comments;


        $hoaDon = HoaDonXuat::with('chi_tiet_hoa_don_xuat')->find($hoaDonId);

        if ($hoaDon->status != 3) {
            return response()->json(['success' => false, 'error' => 'Hóa đơn chưa được nhận hàng'], 401);
        }
        if (!$hoaDon) {
            return response()->json(['success' => false, 'error' => 'Hóa đơn không tồn tại'], 404);
        }

        foreach ($hoaDon->chi_tiet_hoa_don_xuat as $chiTiet) {
            
            $daDanhGia = DanhGia::where('khach_hang_id', $user->id)
                                ->where('hoa_don_xuat_id', $hoaDon->id)
                                ->where('san_pham_id', $chiTiet->san_pham_id)
                                ->exists();
    
            if ($daDanhGia) {    
                return response()->json(['success' => false, 'error' => 'Bạn Đã Đánh Giá Sản Phẩm này rồi'], 401);
            } else {
            
                $danhGia = new DanhGia();
                $danhGia->khach_hang_id = $user->id;
                $danhGia->hoa_don_xuat_id = $hoaDonId;
                $danhGia->san_pham_id = $sanPhamId;
                $danhGia->so_sao = $soSao;
                $danhGia->comments = $comments;
                $danhGia->save();

                return response()->json(['success' => true, 'message' => 'Đánh Giá Sản Phẩm Thành Công.'],200);
            }
        }
    }

    public function danhSachDanhGia($id){
        
            $dsDanhGia = DanhGia::where('san_pham_id',$id)->with('san_pham', 'san_pham.san_pham_bien_the','khach_hang')->get();
        
            return response()->json([
                'success' => true,
                'data' => $dsDanhGia
            ]);
    }
}
