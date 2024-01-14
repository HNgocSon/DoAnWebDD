<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPhamYeuThich;
use App\Models\SanPham;
use App\Models\KhachHang;

class SanPhamYeuThichController extends Controller
{
    public function ThemMoiSanPhamYeuThich(Request $request) 
    {

        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['success' =>  false, 'error' => 'Unauthenticated.'], 401);
        }
    
    
        $sanPham = SanPham::find($request->san_pham);
        if (!$sanPham) {
            return response()->json(['success' => false, 'error' => 'Sản phẩm không tồn tại.'], 404);
        }
    
      
        $kiemTraTonTai = SanPhamYeuThich::where('san_pham_id', $sanPham->id)
            ->where('khach_hang_id', $user->id)
            ->exists();
    
        if ($kiemTraTonTai) {
            return response()->json(['success' => false, 'error' => 'Sản phẩm đã tồn tại trong danh sách yêu thích.'], 400);
        }

        $sanPhamYeuThich = new SanPhamYeuThich();
        $sanPhamYeuThich->san_pham_id = $sanPham->id; 
        $sanPhamYeuThich->khach_hang_id = $user->id;
        $sanPhamYeuThich->save();
    
        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được thêm vào danh sách yêu thích.'], 200);
    }

    public function DanhSachSanPhamYeuThich() 
    {
        $user = auth('api')->user();
    
        $danhSachYeuThich = SanPhamYeuThich::where('khach_hang_id', $user->id)
            ->with('san_pham') 
            ->get();
    
        return response()->json(['success' => true, 'data' => $danhSachYeuThich], 200);
    }
    public function XoaSanPhamYeuThich(Request $request) 
    {
        
        $user = auth('api')->user();

        $sanPhamYeuThich = SanPhamYeuThich::where('khach_hang_id', $user->id)
        ->where('san_pham_id', $request->san_pham)
        ->first();

        if (!$sanPhamYeuThich) {
            return response()->json(['success' => false, 'error' => 'Sản phẩm không tồn tại trong danh sách yêu thích.'], 404);
        }
    
        $sanPhamYeuThich->delete();
    
        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được xóa khỏi danh sách yêu thích.'], 200);
    }
    
    
}
