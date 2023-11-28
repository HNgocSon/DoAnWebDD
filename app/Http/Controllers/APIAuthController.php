<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\KhachHang;

class APIAuthController extends Controller
{
    public function DangKy(Request $request){

        // if(empty($request->email)) {
        //     return response()->json([
        //         'message'=>'vui long nhap day du thong tin'
        //     ]);
        // }

        $khachHang = KhachHang::where('email',$request->email)->first();
        if(!empty($khachHang)) {
            return response()->json([
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

    
    public function DangNhap()
    {
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
}
