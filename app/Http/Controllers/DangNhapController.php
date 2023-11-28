<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class DangNhapController extends Controller
{

    public function trangchu(){
        return view('trangchu');
    }

    public function DangNhap(){
        return view('admin/dang-nhap');
    }

    public function XuLyDangNhap(Request $request){

        if(!isset($request->ten_dang_nhap) || empty($request->ten_dang_nhap)) {
            return redirect()->route('admin.dang-nhap')->with('thong_bao','vui lòng nhập tên');
        }

        if(!isset($request->password) || empty($request->password)) {
            return redirect()->route('admin.dang-nhap')->with('thong_bao','vui lòng nhập password');
        }

        if(Auth::attempt(['ten_dang_nhap'=> $request->ten_dang_nhap,'password'=>$request->password])){
            return redirect()->route('trang-chu')->with('thong_bao','đăng nhập Thành Công');
        }
       return  redirect()->route('admin.dang-nhap')->with('thong_bao','tên đăng nhập hoặc mật khẩu không đúng');
    }
    public function DangXuat()
    {
        auth()->logout();
        return  redirect()->route('admin.dang-nhap')->with('thong_bao','Đăng Xuất Thành Công');
    }


    
}
