<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIHoaDonXuatController;
use App\Http\Controllers\SanPhamYeuThichController;
use App\Http\Controllers\BinhLuanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// API Đăng Nhạp user
Route::middleware('guest:api')->group(function () {
    Route::post('dang-nhap',[APIAuthController::class,'DangNhap']);
    Route::post('dang-ky',[APIAuthController::class,'DangKy']);
    Route::post('forgot-password',[APIAuthController::class,'QuenMatKhau']);
    Route::post('/dang-nhap-google', [AuthController::class, 'dangNhapBangGoogle']);

    Route::post('binh-luan',[BinhLuanController::class,'DanhSachBinhLuan']);
});

Route::middleware('jwt.auth')->group(function () {
    Route::post('dang-xuat',[APIAuthController::class,'DangXuat']);
   
});
Route::middleware('api.auth')->group(function () {
    Route::get('khach-hang',[APIAuthController::class,'LayThongTinKhachHang']);
    Route::post('cap-nhat',[APIAuthController::class,'CapNhatThongTinTaiKhoan']);
    Route::post('cap-nhat-mat-khau',[APIAuthController::class,'CapNhatMatKhau']);
    Route::post('san-pham-yeu-thich',[SanPhamYeuThichController::class,'ThemMoiSanPhamYeuThich']);
    Route::get('danh-sach-yeu-thich',[SanPhamYeuThichController::class,'DanhSachSanPhamYeuThich']);
    Route::post('xoa-yeu-thich',[SanPhamYeuThichController::class,'XoaSanPhamYeuThich']);

    Route::post('them-binh-luan',[BinhLuanController::class,'ThemBinhLuan']);
    Route::post('xoa',[BinhLuanController::class,'XoaBinhLuan']);
});




// API Sản Phẩm.
Route::middleware('guest:api')->group(function () {
    Route::prefix('san-pham')->group(function (){
        Route::get("/",[APISanPhamController::class,"LayDanhSachSanPham"]);
        Route::get("/{id}",[APISanPhamController::class,"LayChiTietSanPham"]);
        Route::post("/tim-kiem",[APISanPhamController::class,"TimKiemSanPham"]);
    });
});

// API loai san pham
Route::middleware('guest:api')->group(function () {
    Route::prefix('loai-san-pham')->group(function (){
        Route::get("/",[APILoaiSanPhamController::class,"LayDanhSachLoaiSanPham"]);
        Route::get("/{id}",[APILoaiSanPhamController::class,"LayChiTietLoaiSanPham"]);
        Route::post("/tim-kiem",[APILoaiSanPhamController::class,"TimKiemLoaiSanPham"]);
    });
});

//Hóa Đơn Xuất
Route::post("/hoa-don",[APIHoaDonXuatController::class,"XuLyHoaDonXuat"]);

//Bình Luận
