<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
class NhaCungCapController extends Controller
{
    public function ThemMoiNCC()
    {
        $dsNCC = NhaCungCap::all();
        return view('nha-cung-cap.them-moi',compact('dsNCC'));
    }
    public function XulyThemMoiNCC(Request $request)
    {
        $ncc = new NhaCungCap();
        $ncc -> ten         =$request -> ten;
        $ncc ->sdt=$request ->sdt;
        $ncc -> dia_chi     =$request ->dia_chi;
        $ncc->save();
        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Thêm Mới NCC thành công');
    }
    public function DanhSachNCC()
    {
        $dsNCC = NhaCungCap::all();
        return view('nha-cung-cap/danh-sach',compact('dsNCC'));
    } 
    public function XoaLoaiNCC($id){
        $dsNCC = NhaCungCap::find($id);
        if(empty($dsNCC))
        {
         return "Nhà Cung Cấp Không tồn tại";
        }
        $dsNCC->delete();
        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Xóa Thành Công');
     }
     public function CapNhatNCC($id){
        $dsNCC = NhaCungCap::find($id);
        return view('nha-cung-cap/cap-nhat',compact('dsNCC'));
        
    }

    public function XuLyCapNhatNCC(Request $request, $id)
    {
 
        $ncc = NhaCungCap::find($id);
        if (empty($ncc)) {
            return "Nhà cung cấp Không Tồn Tại";
        }
        $ncc->ten    = $request->ten;
        $ncc ->sdt=$request ->sdt;
        $ncc -> dia_chi     =$request ->dia_chi;
        $ncc->save();

        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Cập nhật loại sản phẩm thành công');
    }
}
