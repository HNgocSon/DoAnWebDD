<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ResetMatKhauRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;  
use App\Models\KhachHang;

class APIAuthController extends Controller
{
   
    public function DangKy(DangKyRequest $request){

        $khachHang = KhachHang::where('email',$request->email)->first();

        if(!empty($khachHang)) {
            return response()->json([
                'success'=>false,
                'message'=>"email : {$request->email} đã tồn tại"
            ]);
        }
        
        $token = Str::random(64);

        $khachHang = new KhachHang();
        $khachHang->ten = $request->ten;
        $khachHang->sdt = $request->sdt;
        $khachHang->email = $request->email;
        $khachHang->password = Hash::make($request->password);
        $khachHang->dia_chi = $request->dia_chi;
        $khachHang->token = $token;
        $khachHang-> save();



        Mail::send('email.accept-account',compact('khachHang'), function ($message) use ($khachHang){
            $message->to($khachHang->email);
            $message->subject("signup account");
        });

        return response()->json([
            'success'=>true,
            'message'=>'Đăng ký thành công vui lòng xác nhận mail'
        ]);
    }

    public function KiemTraTokenDangKy($khachhang, $token)
    {
        $tokenInfo = DB::table('khach_hang')
            ->where('id', $khachhang)
            ->where('token', $token)
            ->first();

        if (!$tokenInfo) {
            return false;
        }
        $creationTime = Carbon::parse($tokenInfo->created_at);
        $expirationTime = $creationTime->addMinutes(10);
    
        return now()->lessThanOrEqualTo($expirationTime);
    }

    public function Accept($khachhang,$token){

        if (!$this->KiemTraTokenDangKy($khachhang, $token)) {
            return redirect()->route('thong-bao')->with('error','Token đã hết hạn hoặc không hợp lệ');
        }
    
        $user = KhachHang::find($khachhang);
        
        if ($user->status === 1) {
            return redirect()->route('thong-bao')->with('error','Người dùng đã xác thực');
        }
    
        $user->update(['status' => 1, 'token' => null]);
        

        return redirect()->route('thong-bao')->with('thong_bao','xác thực thành công');
    }
    

    
    public function DangNhap(DangNhapRequest $request)
    {

        $credentials = request(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Email đăng nhập hoặc mật khẩu không đúng'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function CapNhatThongTinTaiKhoan(Request $request)
    {
        $user = auth('api')->user(); 

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Người dùng không tồn tại'
            ]);
        }

        if (isset($request->ten) && !empty($request->ten)) {
            $user->ten = $request->ten;
        }

        if (isset($request->sdt) && !empty($request->sdt)) {
            $user->sdt = $request->sdt;
        }

        if (isset($request->dia_chi) && !empty($request->dia_chi)) {
            $user->dia_chi = $request->dia_chi;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thông tin thành công'
        ]);
    }

    public function CapNhatMatKhau(Request $request)
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Người dùng không tồn tại',
            ]);
        }

        if (!Hash::check($request->mat_khau_cu, $user->password)) {
            return response()->json([
                'success' => false,
                'error' => 'Mật khẩu cũ không đúng',
            ]);
        }

        $user->password = Hash::make($request->mat_khau_moi);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật mật khẩu thành công',
        ]);
    }


    public function DangXuat()
    {
        try {
            $user = auth('api')->user();
    
            if ($user) {

                auth('api')->logout();
    
                return response()->json(['message' => 'Đăng Xuất Thành Công']);
            } else {
                
                return response()->json(['error' => 'Người Dùng Chưa Được Xác Thực'], 401);
            }
        } catch (\Exception $e) {
       
            return response()->json(['error' =>'Đăng Xuất Không Thành Công'], 500);
        }
    }


    public function QuenMatKhau(Request $request)
    {
        $user = KhachHang::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if($user->status == 0){
            return response()->json(['message' => 'User not found'], 404);
        }

        $token = Str::random(64);

        DB::table('khach_hang')->update([
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
       

        Mail::send('email.forgot-password', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });


        return response()->json(['message' => 'Password reset email sent']);
    }

    public function ResetMatKhau($token)
    {
        return view('email/reset-password', compact('token'));
    }

    public function KiemTraTokenResetMatKhau($email, $token)
    {

        $tokenInfo = DB::table('khach_hang')
            ->where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$tokenInfo) {
            return false;
        }

        $expirationTime = Carbon::parse($tokenInfo->created_at)->addMinutes(10);
        return now()->lessThanOrEqualTo($expirationTime);
    }

    public function ResetMatKhauPost(ResetMatKhauRequest $request)
    {

        if (!$this->KiemTraTokenResetMatKhau($request->email, $request->token)) {
           return  redirect()->route('thong-bao')->with('error','Token đã hết hạn hoặc không hợp lệ');
        }

        KhachHang::where("email", $request->email)->update(["password" => Hash::make($request->password), 'token' => null]);
       
        return redirect()->route('thong-bao')->with('thong_bao','Cập Nhật Mật Khẩu Thành Công');
    }

    public function LayThongTinKhachHang()
    {
        try {

            if (auth('api')->check()) {
    
                $user = auth('api')->user();

        
                return response()->json(['user' => $user]);
            } else {
            
                return response()->json(['error' => 'Người Dùng Chưa Được Xác Thực '], 401);
            }
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function ThongBao(){
        return view('email/giao-dien');
    }


}

