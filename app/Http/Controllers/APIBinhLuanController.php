<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Gate;
class APIBinhLuanController extends Controller
{
    
    public function ThemBinhLuan(Request $request)
    {
        $user = auth('api')->user();   

        $binhLuan = new BinhLuan();
        $binhLuan->khach_hang_id = $user->id;
        $binhLuan->san_pham_id = $request->san_pham;
        $binhLuan->comments = $request->comments;
        $binhLuan->save();

        return response()->json(['success' => true, 'message' => 'bình luận đã được lưu.']);
    }

    public function BinhLuan(Request $request)
    {
        $sanPhamId = $request->san_pham;

        $danhSachBinhLuan = BinhLuan::where('san_pham_id', $sanPhamId)->with('khach_hang')->get();

        return response()->json(['success' => true, 'data' => $danhSachBinhLuan], 200);
    }

    public function XoaBinhLuan(Request $request)
    {
        $comment = BinhLuan::find($request->comment_id);

        if (!$comment) {
            return response()->json(['success' => false ,'error' => 'Bình luận không tồn tại.'], 404);
        }

        $user = auth('api')->user();

        if ($user->id === $comment->khach_hang_id) {
            $comment->delete();
            return response()->json(['success' => true ,'message' => 'Bình luận đã được xóa.'], 200);
        }

        return response()->json(['success' => false ,'error' => 'Bạn không có quyền xóa bình luận.'], 403);
      
    }


 




  

}
