<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HoaDonXuat;
use App\Models\ChiTietHoaDonXuat;
use App\Models\KhachHang;
use App\Models\SanPhamBienThe;
use App\Models\GioHang;

class APIHoaDonXuatController extends Controller
{
    public function ThanhToan(Request $request)
    {
    $user = auth('api')->user();

    if (!$user) {
        return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
    }
    
    $gioHangIdsToPay = (array) $request->gio_hang_ids;

    $gioHang = GioHang::whereIn('id', $gioHangIdsToPay)->get();

    $hoaDon = new HoaDonXuat();
    $hoaDon->khach_hang_id = $user->id;
    $hoaDon->tong_tien = $this->tinhTongTien($gioHang);
    $hoaDon->ngay_xuat = now();
    $hoaDon->save();

    foreach ($gioHang as $item) {
        $chiTietHoaDon = new ChiTietHoaDonXuat();
        $chiTietHoaDon->hoa_don_xuat_id = $hoaDon->id;
        $chiTietHoaDon->san_pham_id = $item->san_pham_id;
        $chiTietHoaDon->san_pham_bien_the_id = $item->san_pham_bien_the_id;
        $chiTietHoaDon->so_luong = $item->so_luong;
        $chiTietHoaDon->don_gia = $item->san_pham_bien_the->gia;
        $chiTietHoaDon->save();

        $bienThe = SanPhamBienThe::find($item->san_pham_bien_the_id);

        if ($bienThe) {
            if ($bienThe->so_luong >= $item->so_luong) {
                $bienThe->so_luong -= $item->so_luong;
                $bienThe->save();
            } else {
                return response()->json(['error' => 'sản phẩm đã hết hàng']);
            }
        }
      


    }

    GioHang::whereIn('id', $gioHangIdsToPay)->delete();

    return response()->json(['message' => 'Thanh toán thành công', 'hoa_don' => $hoaDon]);
    }

    private function tinhTongTien($gioHang)
    {
        $tongTien = 0;

        foreach ($gioHang as $item) {
            $tongTien += $item->san_pham_bien_the->gia * $item->so_luong;
        }

        return $tongTien;
    }

    public function XemHoaDon(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
        }

        $status = $request->status; 
    
        $query = HoaDonXuat::with('chi_tiet_hoa_don_xuat.san_pham', 'chi_tiet_hoa_don_xuat.san_pham_bien_the')
            ->where('khach_hang_id', $user->id);
    
        if ($status !== null) {
            $query->where('status', $status);
        }
    
        $dsHoaDon = $query->get();
    
        return response()->json([
            'success' => true,
            'data' => $dsHoaDon
        ]);
    }

    public function ThayDoiTrangThai(Request $request,$id)
    {
        $status = $request->trangThai;
        if (!$status) {
            return response()->json(['error' => 'Trạng thái không hợp lệ'], 400);
        }

        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Người dùng chưa đăng nhập'], 401);
        }
    
        $hoaDon = HoaDonXuat::find($id);
    
        if (!$hoaDon) {
            return response()->json(['error' => 'Không tìm thấy hóa đơn'], 404);
        }
    
        $hoaDon->status = $status;
        $hoaDon->save();
    
        return response()->json(['message' => 'Xác Nhận Thành Công']);
    }
    

}
