<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{
    public function DSBinhLuan()
    {
        $dsCMT=BinhLuan::all();
        $dsKhachhang=KhachHang::all();
        return view('quan-ly-binh-luan.danh-sach',compact('dsCMT','dsKhachhang'));
    }
    public function themMoi()
    {
        return view('quan-ly-binh-luan.them-moi');
    }
    public function XulyBinhLuan(Request $request)
    {
        $cmt=BinhLuan::all();
        $cmt->khach_hang_id;
        $cmt->tong_danh_gia;
        $cmt->comments;
        $cmt->thoi_gian;
        $cmt->save();
    }
}
