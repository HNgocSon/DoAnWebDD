<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HinhAnh;
use App\Models\Admin;
use App\Models\SanPhamBienThe;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Gate;

class SanPhamController extends Controller
{
    public function ThemMoiSp(){
        if (Gate::allows('quan-ly-san-pham')) {
            $dsLoaiSp=LoaiSanPham::all();
            return view('san-pham.them-moi',compact('dsLoaiSp'));
        }
        return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
    }

    public function xuLyThemMoiSp(Request $request)
    {
        $sanPham= new SanPham();
        $sanPham->ten     = $request->ten_san_pham;
        $sanPham->loai_san_pham_id = $request->loai_san_pham_id;
        $sanPham->save();  
        
        if(isset($request->gia) && is_array($request->gia) && count($request->gia) > 0){

            $countRows = count($request->gia);

            for( $i = 0 ; $i < $countRows ; $i++){
                $spbt = new SanPhamBienThe();
                $spbt->san_pham_id = $sanPham->id;
                $spbt->gia = $request->gia[$i];
                $spbt->mo_ta = $request->mo_ta[$i];
                $spbt->mau = $request->mau[$i];
                $spbt->man_hinh = $request->man_hinh[$i];
                $spbt->camera = $request->camera[$i];
                $spbt->he_dieu_hanh = $request->he_dieu_hanh[$i];
                $spbt->chip = $request->chip[$i];
                $spbt->ram = $request->ram[$i];
                $spbt->dung_luong = $request->dung_luong[$i];
                $spbt->pin = $request->pin[$i];
                if (!$spbt->save()) {
                    return redirect()->route('san-pham.them-moi')->with('error', 'Lỗi khi lưu biến thể');
                }
            }
        } else {
            return redirect()->route('san-pham.them-moi')->with('error','một sản phẩm có ít nhất một biến thể');
        }
    

        if(!empty($request->img)){
            $files=$request->img;
            foreach($files as $file ){
            $ha = new HinhAnh();
            $ha->url = $file->store('images');
            $ha->san_pham_id = $sanPham -> id;
            $ha->save();
            }
        }
        return redirect()->route('san-pham.danh-sach')->with('thong_bao','Thêm Thành Công');
        
    }

    public function DanhSachSp(Request $request){

        $Page = $request->input('Page', 5 );
        $dsSanPham = SanPham::paginate($Page);
        $ha=HinhAnh::all();
        return view('san-pham/danh-sach',compact('dsSanPham','ha','Page'));

    }
    
    public function XoaSp($id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }

        $sanPham = SanPham::find($id);
        $ha = HinhAnh::all();
        if(empty($sanPham))
        {
            return redirect()->route('san-pham.danh-sach')->with('error','sản phẩm không tồn tại');
        }
        foreach($ha as $HA){
            if($HA->san_pham_id == $sanPham->id ){
                $HA->delete();
            }
        }
        $sanPham->delete();
        
        return redirect()->route('san-pham.danh-sach')->with('thong_bao','Xóa Thành Công');
    }

    public function CapNhatSp($id){
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $dsSanPham = SanPham::find($id);
        $dsLoaiSp = LoaiSanPham::all();
        $ha=HinhAnh::all()->where('san_pham_id',$dsSanPham->id);
        return view('san-pham/cap-nhat',compact('dsSanPham','dsLoaiSp','ha'));
    }

    public function xuLyCapNhatSp(SanPhamRequest $request, $id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }
 
        $sanPham = SanPham::find($id);
        $ha=HinhAnh::all();
        if (empty($sanPham)) {
            return redirect()->route('san-pham.danh-sach')->with('error','sản phẩm không tồn tại');
        }
        $sanPham->ten     = $request->ten;
        $sanPham->loai_san_pham_id = $request->ten_loai;
        $sanPham->save(); 
        

        return redirect()->route('san-pham.danh-sach')->with('thong_bao','Cập Nhật Sản Phẩm Thành Công');
     
    }

    public function BienThe(Request $request, $id)
    {
        $Page = $request->input('Page', 5 );
        $dsSanPham = SanPham::find($id);
        $dsBienThe = SanPhamBienThe::where('san_pham_id', $dsSanPham->id)->paginate($Page);
     
        return view('san-pham/bien-the',compact('dsBienThe','dsSanPham','Page'));
    }   

    public function ThemMoiBienThe($id){
        if (Gate::allows('quan-ly-san-pham')) {
            $dsSanPham = SanPham::find($id);
            return view('san-pham.them-moi-bien-the', compact('dsSanPham'));
        }
        return redirect()->route('trang-chu')->with('error', 'bạn không có quyền truy cập vào chức năng này');
    }
    

    public function xuLyThemMoiBienThe(Request $request)
    {
        $spbt = new SanPhamBienThe();
        $spbt->san_pham_id = $request->input('san_pham_id');
        $spbt->gia = $request->gia;
        $spbt->mo_ta = $request->mo_ta;
        $spbt->mau = $request->mau;
        $spbt->man_hinh = $request->man_hinh;
        $spbt->camera = $request->camera;
        $spbt->he_dieu_hanh = $request->he_dieu_hanh;
        $spbt->chip = $request->chip;
        $spbt->ram = $request->ram;
        $spbt->dung_luong = $request->dung_luong;
        $spbt->pin = $request->pin;
        
        if (!$spbt->save()) {
            return redirect()->route('san-pham.them-moi-bien-the', ['id' => $request->input('san_pham_id')])
                ->with('error', 'Lỗi khi lưu biến thể');
        }

        $sanPhamId = $spbt->san_pham_id;

        return redirect()->route('san-pham.bien-the',['id' => $sanPhamId])->with('thong_bao', 'Thêm Biến Thể Thành Công');
    }


    public function CapNhatBienThe($id)
    {

        $dsBienThe = SanPhamBienThe::find($id);
        return view('san-pham/cap-nhat-bien-the',compact('dsBienThe'));
    }    

    public function XuLyCapNhatBienThe(Request $request, $id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }

        $bienThe = SanPhamBienThe::find($id);
        if (empty($bienThe)) {
            return redirect()->route('san-pham.bien-the')->with('error','Biến Thể không tồn tại');
        }
        $bienThe->gia       = $request->gia;
        $bienThe->mo_ta     = $request->mo_ta;
        $bienThe->mau       = $request->mau;
        $bienThe->man_hinh  = $request->man_hinh;
        $bienThe->camera    = $request->camera;
        $bienThe->he_dieu_hanh = $request->he_dieu_hanh;
        $bienThe->chip      = $request->chip;
        $bienThe->ram       = $request->ram;
        $bienThe->dung_luong = $request->dung_luong;
        $bienThe->pin       = $request->pin;
        $bienThe->save();

         $sanPhamId = $bienThe->san_pham_id;
        
        return redirect()->route('san-pham.bien-the',['id' => $sanPhamId])->with('thong_bao','Thêm Thành Công');
    }
    
    public function XoaBienThe($id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }
        
        $bienThe = SanPhamBienThe::find($id);
        $sanPhamId = $bienThe->san_pham_id;

        $bienThe->delete();  
        return redirect()->route('san-pham.bien-the',['id' => $sanPhamId])->with('thong_bao','Xóa Thành Công');
    }

    public function XemAnh($id)
    {
        $dsSanPham = SanPham::find($id);
        $ha=HinhAnh::all()->where('san_pham_id',$dsSanPham->id);
        return view('san-pham/xem-anh',compact('ha','dsSanPham'));
    }   

    public function CapNhatAnh($id)
    {

        $dsSanPham = SanPham::find($id);
        $ha=HinhAnh::all()->where('san_pham_id',$dsSanPham->id);
        
        return view('san-pham/sua-anh',compact('ha','dsSanPham'));
    }    

    public function XuLyCapNhatAnh(Request $request, $id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }

        $sanPham = SanPham::find($id);
        if(!empty($request->img)){
            $files=$request->img;
            foreach($files as $file ){
            $ha = new HinhAnh();
            $ha->san_pham_id = $sanPham -> id;
            $ha->url=$file->store('images');
            $ha->save();
            }
        }
        return redirect()->route('san-pham.cap-nhat-anh',['id' => $sanPham->id])->with('thong_bao','Thêm Thành Công');
    }
    
    public function XoaAnh($id)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','Bạn Không Có Quyền truy cập vào chức năng này');
        }
        $ha = HinhAnh::find($id);
        $sanPhamId = $ha->san_pham_id;
        $ha->delete();  
        return redirect()->route('san-pham.cap-nhat-anh',['id' => $sanPhamId])->with('thong_bao','Xóa Thành Công');
    }

    public function Search(Request $request)
    {
        if (Gate::denies('quan-ly-san-pham')) {
            return redirect()->route('trang-chu')->with('error','bạn không có quyền truy cập vào chức năng này');
        }
        $query = $request->input('query');
        $Page = $request->input('Page', 5); 
        $dsSanPham = SanPham::where('ten', 'LIKE', "%$query%")->paginate($Page);

        return view('san-pham/danh-sach', compact('dsSanPham','Page'));
    }
}
