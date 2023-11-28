<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class DangNhapController extends Controller
{
    public function DangNhap(){
        return view('admin/dang-nhap');
    }

    public function XuLyDangNhap(Request $request){
        if(Auth::attempt(['ten_dang_nhap'=> $request->ten_dang_nhap,'password'=>$request->password])){
            return "dang nhap thanh cong";
        }
       return "dang nhap khong thanh cong"; 
    }
    public function DangXuat()
    {
        auth()->logout();
        return view('trang-chu');
    }


    
}
