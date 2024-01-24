<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ThongKe;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
use App\Models\HoaDonXuat;
use App\Models\HoaDonNhap;
use App\Models\ChiTietHoaDonXuat;
use App\Models\ChiTietHoaDonNhap;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
class ThongKeController extends Controller
{
   
    public function DoanhSoBanHang(Request $request)
    {
        if (Gate::denies('quan-ly-thong-ke')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }

        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
    
        $query = HoaDonXuat::query();
    
        if ($ngayBatDau && $ngayKetThuc) {
            $query->whereBetween('ngay_xuat', [$ngayBatDau, $ngayKetThuc]);
        } elseif ($ngayBatDau) {
            $query->whereDate('ngay_xuat', '>=', $ngayBatDau);
        } elseif ($ngayKetThuc) {
            $query->whereDate('ngay_xuat', '<=', $ngayKetThuc);
        }
    
        $tongHoaDon = $query->where('status', '!=', '4')->count();
        $tongTien = $query->where('status', '!=', '4')->sum('tong_tien');
        $tongTienThucTe = $query->where('status', '=', '3')->sum('tong_tien');
    
        return view('thong-ke/doanh-so-ban-hang', compact('tongHoaDon', 'tongTienThucTe', 'tongTien', 'ngayBatDau', 'ngayKetThuc'));
    }

    public function SoLuongTonKho(Request $request)
    {
        if (Gate::denies('quan-ly-thong-ke')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
        $tongSoLuongTonKho = SanPhamBienThe::sum('so_luong');
        $tongGiaTriTonKho = SanPhamBienThe::sum('gia');

        $query = SanPhamBienThe::query();

        if ($ngayBatDau && $ngayKetThuc) {
            $query->whereBetween('updated_at', [$ngayBatDau, $ngayKetThuc]);
        } elseif ($ngayBatDau) {
            $query->whereDate('updated_at', '>=', $ngayBatDau);
        } elseif ($ngayKetThuc) {
            $query->whereDate('updated_at', '<=', $ngayKetThuc);    
        }
        
        $tongSoLuongTonKhoTheoThoiGian =  $query->sum('so_luong');

        $hoaDonNhap = ChiTietHoaDonNhap::query();
        if ($ngayBatDau && $ngayKetThuc) {
            $hoaDonNhap->whereBetween('ngay_nhap', [$ngayBatDau, $ngayKetThuc]);
        } elseif ($ngayBatDau) {
            $hoaDonNhap->whereDate('ngay_nhap', '>=', $ngayBatDau);
        } elseif ($ngayKetThuc) {
            $hoaDonNhap->whereDate('ngay_nhap', '<=', $ngayKetThuc);    
        }

        $tongSoLuongNhapKho = $hoaDonNhap->join('hoa_don_nhap', 'chi_tiet_hoa_don_nhap.hoa_don_nhap_id', '=', 'hoa_don_nhap.id')
        ->sum('chi_tiet_hoa_don_nhap.so_luong');
    

        $hoaDonXuat = ChiTietHoaDonXuat::query();
        if ($ngayBatDau && $ngayKetThuc) {
            $hoaDonXuat->whereBetween('ngay_xuat', [$ngayBatDau, $ngayKetThuc]);
        } elseif ($ngayBatDau) {
            $hoaDonXuat->whereDate('ngay_xuat', '>=', $ngayBatDau);
        } elseif ($ngayKetThuc) {
            $hoaDonXuat->whereDate('ngay_xuat', '<=', $ngayKetThuc);    
        }

        $tongSoLuongXuatKho = $hoaDonXuat->join('hoa_don_xuat', 'chi_tiet_hoa_don_xuat.hoa_don_xuat_id', '=', 'hoa_don_xuat.id')
        ->where('hoa_don_xuat.status', '!=', '4')
        ->sum('chi_tiet_hoa_don_xuat.so_luong');
        
        
        return view('thong-ke/so-luong-ton-Kho', compact('tongSoLuongTonKho', 'tongSoLuongTonKhoTheoThoiGian','tongSoLuongNhapKho','tongSoLuongXuatKho','tongGiaTriTonKho', 'ngayBatDau', 'ngayKetThuc'));
        
    }


}
