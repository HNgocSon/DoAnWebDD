<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Gate;
class BinhLuanController extends Controller
{
    public function DanhSachBinhLuan(Request $request)
    {
        $Page = $request->input('Page', 5 );
        $dsBinhLuan = BinhLuan::paginate($Page);
        return view('quan-ly-binh-luan/danh-sach', compact('dsBinhLuan','Page'));
    }


    public function XoaBinhLuan($id)
    {
        if (Gate::denies('quan-ly-binh-luan')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }
            $binhLuan = BinhLuan::find($id);
            $binhLuan->delete();  
            return redirect()->route('binh-luan.danh-sach')->with('thong_bao','Xóa Thành Công');
    }

//     public function TraLoiBinhLuan(Request $request)
//     {   
//         $binhLuan = new BinhLuan();
//         $binhLuan->khach_hang_id = auth('api')->user()->id;
//         $binhLuan->comments = $request->commenst;
//         $binhLuan->parent_id = $request->parent_id;


//         return redirect()->back()->with('success', 'Bình luận đã được thêm.');
//     }
}
