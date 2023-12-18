<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HoaDonXuat;
use App\Models\ChiTietHoaDon;
use App\Models\KhachHang;

class APIHoaDonXuatController extends Controller
{
    public function XuLyHoaDonXuat(Request $request)
    {
        $hoaDon = new HoaDonXuat();
        $hoaDon->khach_hang_id = $request->khach_hang;
        $hoaDon->tong_tien = 0;
        switch ($request->hanh_dong) {
            case 'chuyen_khoan':
                $hoaDon->status = 1; // Đã chuyển khoản
                break;
            case 'huy_hang':
                $hoaDon->status = 2; // Hủy hàng
                break;
            default:
                $hoaDon->status = 0; // Chưa Thanh Toán
                break;
        }
        $hoaDon->save();
        $TongTien=0;    

        for($i = 0; $i < count((array) $request->id); $i++){
            $ctHoaDon = new ChiTietHoaDonXuat();
            $ctHoaDon->hoa_don_xuat_id = $hoaDon->id;
            $ctHoaDon->san_pham_id = $request->san_pham[$i];
            $ctHoaDon->so_luong = $request->so_luong[$i];
            $ctHoaDon->gia_ban = $request->gia_ban[$i];
            $ctHoaDon->tong_tien = $request->so_luong[$i]*$request->gia_ban[$i];
            $ctHoaDon->save();

            $TongTien += $ctHoaDon->tong_tien;

            $sanPham = SanPham::find( $request->id[$i]);
            if( $hoaDon->status == 1){
              $sanPham->so_luong -= $ctHoaDon->so_luong;
              $sanPham->save();
            }
           
        }

        $hoaDon->tong_tien=$TongTien;
        $hoaDon->save();
        return response()->json(['message' => 'tạo hóa đơn thành công']);
    } 
}
