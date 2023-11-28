<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HoaDonXuat;
use App\Models\KhachHang;
class HoaDonXuatController extends Controller
{
    public function HoaDon()
    {
        $dsSanPham=SanPham::all();
        $dsKhachHang=KhachHang::all();
        return view("hoa-don-xuat/them-moi", compact("dsSanPham","dsKhachHang"));
    }
    

    public function xuLyThemMoiHD(Request $request){
        $hoaDon= new HoaDonXuat();
        $hoaDon->san_pham_id    = $request->ten_sp ;
        $hoaDon->ngay_tao    = $request->Ngay_tao;
        $hoaDon->khach_hang_id    = $request->khach_hang;
        $hoaDon->tong_tien     = $request->tong_tien;
        $hoaDon->save();
        return redirect()->route('hoa-don-xuat.danh-sach');
     
        
    }
    public function DanhSach()
    {
        $dsHD=HoaDonXuat::all();
        return view('hoa-don-xuat/danh-sach', compact('dsHD'));
    }
}
