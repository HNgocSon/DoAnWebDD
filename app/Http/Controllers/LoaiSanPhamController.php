<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Http\Requests\LoaiSanPhamRequest;
use Illuminate\Support\Facades\Gate;
class LoaiSanPhamController extends Controller
{
    public function ThemMoiLoaiSp()
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        return view('loai-san-pham/them-moi');
    }
    public function XuLyThemMoiLoai(LoaiSanPhamRequest $request)
    {
        $loaiSp  = LoaiSanPham::all();

        foreach ($loaiSp as $LS )
        if($LS->ten_loai == $request->ten_loai)
        {
            return redirect()->route('loai-san-pham.danh-sach')->with('error','loại sản phẩm đã tồn tại');
        }
        
        $LoaiSp = new LoaiSanPham();
        $LoaiSp->ten_loai    = $request->ten_loai;
         $file = $request->img;
         $LoaiSp->img = $file->store('images');
        $LoaiSp->save();
        return redirect()->route('loai-san-pham.danh-sach')->with('thong_bao','Thêm Thành Công');

    }

    public function DanhSachLoaiSp(Request $request)
    {
        $Page = $request->input('Page', 5 );
        $dsLoaiSp=LoaiSanPham::paginate($Page);
        return view('loai-san-pham/danh-sach',compact('dsLoaiSp','Page'));
    }
    public function XoaLoaiSp($id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }

        $LoaiSp = LoaiSanPham::find($id);

        if(empty($LoaiSp))
        {
            return redirect()->route('loai-san-pham.danh-sach')->with('error','loại sản phẩm không tồn tại');
        }
        $LoaiSp->delete();

        return redirect()->route('loai-san-pham.danh-sach')->with('thong_bao','Xóa Thành Công');
     }
 
     public function CapNhatLoaiSp($id)
     {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
         $dsLoaiSp = LoaiSanPham::find($id);
         return view('loai-san-pham/cap-nhat',compact('dsLoaiSp'));
         
     }
 
     public function XuLyCapNhatLoaiSp(LoaiSanPhamRequest $request, $id)
     {
  
         $LoaiSp = LoaiSanPham::find($id);
         if (empty($LoaiSp)) {
            return redirect()->route('loai-san-pham.danh-sach')->with('error','loại sản phẩm không tồn tại');
         }
         $LoaiSp->ten_loai    = $request->ten_loai;
         $LoaiSp->save();
         return redirect()->route('loai-san-pham.danh-sach')->with('thong_bao','Cập nhật loại sản phẩm thành công');
     }

     public function Search(Request $request)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $query = $request->input('query');

        $dsLoaiSp = LoaiSanPham::where('ten_loai', 'LIKE', "%$query%")->get();

        return view('loai-san-pham/danh-sach', compact('dsLoaiSp'));
    }

}
