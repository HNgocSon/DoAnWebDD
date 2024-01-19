<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;
class BinhLuanController extends Controller
{
    public function DanhSachBinhLuan(Request $request)
    {
        $Page = $request->input('Page', 5 );
        $dsBinhLuan = BinhLuan::paginate($Page);
        return view('quan-ly-binh-luan/danh-sach', compact('dsBinhLuan','Page'));
    }
}
