<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HoaDonNhap;
use App\Models\ChiTietHoaDonNhap;
class ChiTietHoaDonNhapController extends Controller
{
    public function XemChiTietHoaDonNhap($id){
        $hoaDon = HoaDonNhap::find($id);
        $dsSanPham = SanPham::all();
        $chiTietHoaDon = ChiTietHoaDonNhap::all();
        return view('hoa-don-nhap/chi-tiet-hoa-don-nhap',compact('hoaDon','dsSanPham','chiTietHoaDon'));
    }
}
