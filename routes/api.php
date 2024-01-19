<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIHoaDonXuatController;
use App\Http\Controllers\APISanPhamYeuThichController;
use App\Http\Controllers\APIBinhLuanController;
use App\Http\Controllers\APIGioHangController;
use App\Http\Controllers\APIDanhGiaController;


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

});

//user
Route::middleware('jwt.auth')->group(function () {
    Route::post('dang-xuat',[APIAuthController::class,'DangXuat']);
   
});
Route::middleware('api.auth')->group(function () {
    Route::get('khach-hang',[APIAuthController::class,'LayThongTinKhachHang']);
    Route::post('cap-nhat',[APIAuthController::class,'CapNhatThongTinTaiKhoan']);
    Route::post('cap-nhat-mat-khau',[APIAuthController::class,'CapNhatMatKhau']);
});

//sanphamyeu thích
Route::middleware('api.auth')->group(function () {
    Route::post('san-pham-yeu-thich',[APISanPhamYeuThichController::class,'ThemMoiSanPhamYeuThich']);
    Route::get('danh-sach-yeu-thich',[APISanPhamYeuThichController::class,'DanhSachSanPhamYeuThich']);
    Route::post('xoa-yeu-thich',[APISanPhamYeuThichController::class,'XoaSanPhamYeuThich']);
});


//giỏ hàng 
Route::middleware('api.auth')->group(function () {
    Route::post('them-vao-gio-hang',[APIGioHangController::class,'ThemSanPhamVaoGioHang']);
    Route::get('gio-hang',[APIGioHangController::class,'LayThongTinGioHang']);
    Route::delete('xoa-gio-hang/{id}',[APIGioHangController::class,'XoaSanPhamKhoiGiohang']);
});


//hóa Đơn xuất

Route::middleware('api.auth')->group(function () {
    Route::post('mua-hang',[APIHoaDonXuatController::class,'MuaHang']);
    Route::post("/hoa-don",[APIHoaDonXuatController::class,"XuLyHoaDonXuat"]);
    Route::get("/xem-hoa-don",[APIHoaDonXuatController::class,"XemHoaDon"]);
    Route::post("/thay-doi-trang-thai/{id}",[APIHoaDonXuatController::class,"ThayDoiTrangThai"]);
});

//đánh giá
Route::middleware('api.auth')->group(function () {
    Route::post("/them-danh-gia",[APIDanhGiaController::class,"ThemDanhGia"]);
});
Route::get("/danh-gia/{id}",[APIDanhGiaController::class,"danhSachDanhGia"]);
    

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


//Bình Luận
Route::middleware('api.auth')->group(function () {
    Route::post('them-binh-luan',[APIBinhLuanController::class,'ThemBinhLuan']);
    Route::post('xoa',[APIBinhLuanController::class,'XoaBinhLuan']);
});
Route::post('binh-luan',[APIBinhLuanController::class,'BinhLuan']);
