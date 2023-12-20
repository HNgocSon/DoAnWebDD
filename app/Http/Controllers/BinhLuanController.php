<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Gate;
class BinhLuanController extends Controller
{
    public function DanhSachBinhLuan(Request $request)
    {
        $Page = $request->input('Page', 5 );
        $dsCMT=BinhLuan::paginate($Page);
        $dsKhachhang=KhachHang::all();
        return view('quan-ly-binh-luan/danh-sach',compact('dsCMT','dsKhachhang','Page'));
    }

    public function XoaBinhLuan($id)
    {
        $binhLuan=BinhLuan::find($id);
        $binhLuan->delete();
        return redirect()->route('binh-luan.danh-sach')->with('thong_bao','xóa bình luận thành công');
    }

}
