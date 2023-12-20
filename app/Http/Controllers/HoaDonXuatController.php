<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\HoaDonXuat;
use App\Models\KhachHang;
use App\Models\ChiTietHoaDonXuat;
use Illuminate\Support\Facades\Gate;
class HoaDonXuatController extends Controller
{


    public function DanhSach(Request $request)
    {
        $Page = $request->input('Page', 5 );
        $dsHoaDonXuat = HoaDonXuat::paginate($Page);
        return view('hoa-don-xuat/danh-sach', compact('dsHoaDonXuat','Page'));
    }

    public function XemChiTietHoaDonNhap($id)
    {
        if (Gate::denies('quan-ly-hoa-don-xuat')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $hoaDon = HoaDonXuat::find($id);
        $dsSanPham = SanPham::all();
        $chiTietHoaDon = ChiTietHoaDonXuat::all();
        return view('hoa-don-xuat/chi-tiet-hoa-don-xuat',compact('hoaDon','dsSanPham','chiTietHoaDon'));
    }

    public function XoaHoaDonXuat($id){
        if (Gate::denies('quan-ly-hoa-don-xuat')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $hoaDon = HoaDonXuat::find($id);

        $ctHoaDonXuat = ChiTietHoaDonXuat::all();
        if(empty($hoaDon))
        {
            return redirect()->route('hoa-don-xuat.danh-sach')->with('error','Hóa Đơn Không Tồn Tại');
        }
        foreach($ctHoaDonXuat as $ctHoaDon){
            if($ctHoaDon->hoa_don_xuat_id == $hoaDon->id ){
                $ctHoaDon->delete();
            }
        }
        $hoaDon->delete();
        
        return redirect()->route('hoa-don-xuat.danh-sach')->with('thong_bao','Xóa Thành Công');
    }
}
