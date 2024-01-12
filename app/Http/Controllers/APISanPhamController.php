<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;
use App\Models\SanPhamBienThe;
class APISanPhamController extends Controller
{
    public function LayDanhSachSanPham(){
        $dsSanPham = SanPham::with('hinh_anh','san_pham_bien_the')->get();
        return response()->json([
            'success'=>true,
            'data'=>$dsSanPham
        ]);

    }

    public function LayChiTietSanPham($id){
        $sanPham = SanPham::with('loai_san_pham','san_pham_bien_the','hinh_anh')->where('id',$id)->first();

        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);
    }

    public function TimKiemSanPham(Request $request){
        
        
        $sanPham = SanPham::where('ten', 'LIKE', '%' . $request->ten . '%')->get();
     

        if(count($sanPham) == 0){
            return response()->json([
                'success'=>false,
                'message'=>"san pham {$request->ten} khong ton tai"
            ]);
        }

        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);

 
    }
}
