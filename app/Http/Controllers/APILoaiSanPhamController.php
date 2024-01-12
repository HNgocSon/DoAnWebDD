<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use App\Models\SanPham;
class APILoaiSanPhamController extends Controller
{
    public function LayDanhSachLoaiSanPham()
    {   
        $dsLoaiSanPham = LoaiSanPham::with('ds_san_pham.san_pham_bien_the')->get();
        return response()->json([
            'success'=>true,
            'data'=>$dsLoaiSanPham
        ]);
    }

    public function LayChiTietLoaiSanPham($id)
    {
        $loaiSanPham = LoaiSanPham::with('ds_san_pham', 'ds_san_pham.san_pham_bien_the','ds_san_pham.hinh_anh')->find($id);
    
        return response()->json([
            'success' => true,
            'data' => $loaiSanPham
        ]);
    }

    public function TimKiemLoaiSanPham(Request $request){
        
        $loaiSanPham = LoaiSanPham::where('ten_loai', 'LIKE', '%' . $request->ten_loai . '%')->get();
        if(count($loaiSanPham) == 0)
        {
            return response()->json([
                'success'=>false,
                'message'=>' loai san pham khong ton tai'
            ]);  
        }
        return response()->json([
            'success'=>true,
            'data'=>$loaiSanPham
        ]);
    }

  

}
