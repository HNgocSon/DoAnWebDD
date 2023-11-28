<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class APIAuthController extends Controller
{
    public function DangKy(Request $request){

        if(!isset($request->password)||empty($request->password)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập password'
            ]);
        }

        if(!isset($request->ten)||empty($request->ten)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập tên'
            ]);
        }

        if(!isset($request->sdt)||empty($request->sdt)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập tên'
            ]);
        }

        if(!isset($request->dia_chi)||empty($request->dia_chi)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập địa chỉ'
            ]);
        }

        if(!isset($request->email)||empty($request->email)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập địa chỉ email'
            ]);
        }

        $khachHang = KhachHang::where('email',$request->email)->first();

        if(!empty($khachHang)) {
            return response()->json([
                'success'=>false,
                'message'=>"email : {$request->email} da ton tai"
            ]);
        }

        

        $khachHang = new KhachHang();
        $khachHang->ten = $request->ten;
        $khachHang->sdt = $request->sdt;
        $khachHang->email = $request->email;
        $khachHang->password = Hash::make($request->password);
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang-> save();

        return response()->json([
            'success'=>true,
            'message'=>'dang ky thanh cong'
        ]);
    }

    
    public function DangNhap(Request $request)
    {
        if(!isset($request->email) || empty($request->email)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập địa chỉ email'
            ]);
        }

        if(!isset($request->password) || empty($request->password)) {
            return response()->json([
                'success'=>false,
                'message'=>'vui lòng nhập password '
            ]);
        }

        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function DangXuat()
    {
        {
            auth('api')->logout();
            return response()->json(['message' => 'Successfully logged out']);
        }
    }


    public function ResetMatKhau(){
        
    }
}
