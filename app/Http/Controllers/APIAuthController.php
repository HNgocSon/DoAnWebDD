<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ResetMatKhauRequest;
use App\Http\Requests\DangKyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;  
use App\Models\KhachHang;
use App\Models\ResetMatKhau;

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
                'message'=>'vui lòng nhập So dien thoai'
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
        
        $token = Str::random(64);
        
        Mail::send('email.accept-account', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("signup account");
        });

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


    public function Accept($id){
       $user = KhachHang::find($id);
            $user->status = 1;
            $user -> save();
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

        if (!$token = auth('api')->attempt($credentials)) {
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


    public function QuenMatKhau(Request $request)
    {

    
        $user = KhachHang::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        DB::table('reset_mat_khau')->where('email', $request->email)->delete();

        $token = Str::random(64);

        DB::table('reset_mat_khau')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forget-password', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("reset password");
        });

        return response()->json(['message' => 'Password reset email sent']);
    }

    public function ResetMatKhau($token)
    {
        return view('email/reset-password', compact('token'));
    }

    public function isTokenValid($email, $token)
    {
        $tokenInfo = DB::table('reset_mat_khau')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$tokenInfo) {
            return false;
        }

        $expirationTime = Carbon::parse($tokenInfo->created_at)->addMinutes(2);
        return now()->lessThanOrEqualTo($expirationTime);
    }

    public function ResetMatKhauPost(ResetMatKhauRequest $request)
    {
        $updatePassword = DB::table('reset_mat_khau')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$this->isTokenValid($request->email, $request->token)) {
            return "Token đã hết hạn hoặc không hợp lệ";
        }

        KhachHang::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        return "Cập nhật mật khẩu thành công";
    }
}

