<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
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

    public function ChiTietHoaDonXuat($id)
    {
        if (Gate::denies('quan-ly-hoa-don-xuat')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $hoaDon = HoaDonXuat::find($id);
        $dsSanPham = SanPham::all();
        $dsBienThe = SanPhamBienThe::all();
        $chiTietHoaDon = ChiTietHoaDonXuat::all();
        return view('hoa-don-xuat/chi-tiet-hoa-don-xuat',compact('hoaDon','dsSanPham','chiTietHoaDon','dsBienThe'));
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

    public function ThayDoiTrangThaiDon(Request $request, $id)
    {
   
        $trangthai = $request->trangthai;

        $hoaDon = HoaDonXuat::find($id);

        if (empty($hoaDon)) {
            return redirect()->route('hoa-don-xuat.danh-sach')->with('error', 'Hóa Đơn Không Tồn Tại');
        }
        $hoaDon->status = $trangthai;
        $hoaDon->save();

        if($trangthai==4){

            $chiTietHoaDon = ChiTietHoaDonXuat::where('hoa_don_xuat_id',$hoaDon->id)
            ->get();

            foreach($chiTietHoaDon as $chiTiet){
                $sanPhamBienThe = SanPhamBienThe::where('id',$chiTiet->san_pham_bien_the_id)->first();
                $sanPhamBienThe->so_luong += $chiTiet->so_luong;
                $sanPhamBienThe->save();
            }
        }
        return redirect()->route('hoa-don-xuat.danh-sach')->with('thong_bao', 'Thay Đổi Trạng Thái Thành Công');
    }

}
