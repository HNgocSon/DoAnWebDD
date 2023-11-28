<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use App\Models\HoaDonNhap;
class HoaDonNhapController extends Controller
{
    public function HoaDonNhap()
    {
        $dsNCC=NhaCungCap::all();
        return view("hoa-don-nhap/them-moi", compact("dsNCC"));
    }
    

    public function xuLyThemMoiHDNhap(Request $request){
        $HDN= new HoaDonNhap();
        $HDN->nha_cung_cap_id    = $request->ten_ncc;
        $HDN->ngay_nhap    = $request->Ngay_nhap;
        $HDN->tong_tien     = $request->tong_tien;
        $HDN->save();
        return redirect()->route('hoa-don-nhap.danh-sach');
     
        
    }
    public function DanhSachHDN()
    {
        $dsHDN=HoaDonNhap::all();
        return view('hoa-don-nhap/danh-sach', compact('dsHDN'));
    }
}
