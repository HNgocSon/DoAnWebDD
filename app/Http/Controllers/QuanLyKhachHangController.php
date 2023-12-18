<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Gate;
class QuanLyKhachHangController extends Controller
{
    public function DanhSachKhachHang(){
        $dsKhachHang = KhachHang::all();
        return view('quan-ly-tai-khoan-khach-hang/danh-sach',compact('dsKhachHang'));
    }

    public function XoaTaiKhoan($id){
        if (Gate::denies('quan-ly-tai-khoan-nguoi-dung')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $KhachHang = KhachHang::find($id);
        $KhachHang->delete();  
        return redirect()->route('khach-hang.danh-sach')->with('thong_bao','Xóa Thành Công');
    }

    public function ChiTietKhachHang($id){
        if (Gate::denies('quan-ly-tai-khoan-nguoi-dung')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $KhachHang = KhachHang::find($id);
        return view('quan-ly-tai-khoan-khach-hang/chi-tiet-tai-khoan',compact('KhachHang'));
    }

    public function Search(Request $request)
    {
        if (Gate::denies('quan-ly-tai-khoan-nguoi-dung')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $query = $request->input('query');

        $dsKhachHang = KhachHang::where('ten', 'LIKE', "%$query%")
        ->orWhere('sdt', 'LIKE', "%$query%")
        ->orWhere('email', 'LIKE', "%$query%")
        ->orWhere('dia_chi', 'LIKE', "%$query%")
        ->get();

        return view('quan-ly-tai-khoan-khach-hang/danh-sach', compact('dsKhachHang'));
    }

}
