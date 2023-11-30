<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use App\Models\ChiTietHoaDonNhap;

class HoaDonNhapController extends Controller
{

    function DanhSachHoaDonNhap(request $request){
        $dsHoaDonNhap= HoaDonNhap::all();
        return view('hoa-don-nhap/danh-sach',compact('dsHoaDonNhap'));
    }

    public function ThemHoaDonNhap(){
        $dsSanPham = SanPham::all();
        $dsNhaCungCap = NhaCungCap::all();
        return view('hoa-don-nhap/them-moi',compact('dsSanPham','dsNhaCungCap'));
    }

    public function XuLyHoaDonNhap(Request $request){

        $hd = new HoaDonNhap();
        $hd->nha_cung_cap_id = $request->nha_cung_cap_id;
        $hd->tong_tien =  0;
        $hd->save();
        $TongTien=0;
     

        
        for($i=0 ; $i < count( (array) $request->idSP) ; $i++){
            $cthd = new ChiTietHoaDonNhap();
            $cthd->hoa_don_nhap_id = $hd->id;
            $cthd->san_pham_id = $request->idSP[$i];
            $cthd->so_luong = $request->soLuong[$i];
            $cthd->gia_nhap = $request->giaNhap[$i];
            $cthd->gia_ban = $request->giaBan[$i];
            $cthd->thanh_tien = $request->thanhTien[$i];
            $cthd->save();

            $TongTien += $cthd->thanh_tien;

            $sp = SanPham::find($cthd->san_pham_id);
            $sp->so_luong += $cthd->so_luong;
            $sp->gia = $cthd->gia_ban;
            $sp->save();
        }
        $hd->tong_tien=$TongTien;
        $hd->save();

        return redirect()->route('hoa-don-nhap.danh-sach')->with('thong_bao','Nhập Hàng Thành Công');
    }

    public function XoaHoaDonNhap($id){

        $hoaDon = HoaDonNhap::find($id);

        $ctHoaDonNhap = ChiTietHoaDonNhap::all();
        if(empty($hoaDon))
        {
            return redirect()->route('hoa-don-nhap.danh-sach')->with('error','Hóa Đơn Không Tồn Tại');
        }
        foreach($ctHoaDonNhap as $ctHoaDon){
            if($ctHoaDon->hoa_don_nhap_id == $hoaDon->id ){
                $ctHoaDon->delete();
            }
        }
        $hoaDon->delete();
        
        return redirect()->route('hoa-don-nhap.danh-sach')->with('thong_bao','Xóa Thành Công');
    }
}
