<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use App\Models\HoaDonNhap;
use App\Models\SanPham;
use App\Models\ChiTietHoaDonNhap;
use Illuminate\Support\Facades\Gate;

class HoaDonNhapController extends Controller
{

    function DanhSachHoaDonNhap(request $request){
        $Page = $request->input('Page', 5 );
        $dsHoaDonNhap= HoaDonNhap::paginate($Page);
        return view('hoa-don-nhap/danh-sach',compact('dsHoaDonNhap','Page'));
    }

    public function ThemHoaDonNhap(){
        if (Gate::denies('quan-ly-hoa-don-nhap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
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
        if (Gate::denies('quan-ly-hoa-don-nhap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
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

    public function XemChiTietHoaDonNhap($id)
    {
        if (Gate::denies('quan-ly-hoa-don-nhap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $hoaDon = HoaDonNhap::find($id);
        $dsSanPham = SanPham::all();
        $chiTietHoaDon = ChiTietHoaDonNhap::all();
        return view('hoa-don-nhap/chi-tiet-hoa-don-nhap',compact('hoaDon','dsSanPham','chiTietHoaDon'));
    }

    public function Search(Request $request)
    {
        if (Gate::denies('quan-ly-hoa-don-nhap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $query = $request->input('query');

        $dsHoaDonNhap = HoaDonNhap::where('ngay_nhap', 'LIKE', "%$query%")
        ->orWhere('tong_tien', 'LIKE', "%$query%")
        ->orWhere('nha_cung_cap_id', 'LIKE', "%$query%")
        ->join('nha_cung_cap', 'hoa_don_nhap.nha_cung_cap_id', '=', 'nha_cung_cap.id')
        ->orwhere('nha_cung_cap.ten', 'LIKE', "%$query%")
        ->get();
            
        return view('hoa-don-nhap/danh-sach',compact('dsHoaDonNhap'));
    }
}
