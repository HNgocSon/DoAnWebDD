<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaCungCap;
use App\Http\Requests\ThemMoiNhaCungCapRequest;
use Illuminate\Support\Facades\Gate;
class NhaCungCapController extends Controller
{
    public function ThemMoiNCC()
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $dsNCC = NhaCungCap::all();
        return view('nha-cung-cap.them-moi',compact('dsNCC'));
    }
    public function XulyThemMoiNCC(ThemMoiNhaCungCapRequest $request)
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
    public function XoaLoaiNCC($id)
    {
        if (Gate::denies('quan-ly-nha-cung-cap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $dsNCC = NhaCungCap::find($id);
        if(empty($dsNCC))
        {
         return "Nhà Cung Cấp Không tồn tại";
        }
        $dsNCC->delete();
        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Xóa Thành Công');
     }

     public function CapNhatNCC($id)
     {
        if (Gate::denies('quan-ly-nha-cung-cap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $dsNCC = NhaCungCap::find($id);
        return view('nha-cung-cap/cap-nhat',compact('dsNCC'));
        
    }

    public function XuLyCapNhatNCC(ThemMoiNhaCungCapRequest $request, $id)
    {
        $ncc = NhaCungCap::find($id);
        if (empty($ncc)) {
            return "Nhà cung cấp Không Tồn Tại";
        }
        $ncc->ten    = $request->ten;
        $ncc ->sdt=$request ->sdt;
        $ncc -> dia_chi     =$request ->dia_chi;
        $ncc->save();

        return redirect()->route('nha-cung-cap.danh-sach')->with('thong_bao','Cập nhật nhà cung cấp thành công');
    }

    public function Search(Request $request)
    {
        if (Gate::denies('quan-ly-nha-cung-cap')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $query = $request->input('query');

        $dsNCC = NhaCungCap::where('ten', 'LIKE', "%$query%")
        ->orWhere('sdt', 'LIKE', "%$query%")
        ->orWhere('dia_chi', 'LIKE', "%$query%")
        ->get();

        return view('nha-cung-cap/danh-sach', compact('dsNCC'));
    }
}
