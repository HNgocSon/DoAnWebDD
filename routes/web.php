<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;


use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\HoaDonXuatController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\HoaDonNhapController;
use App\Http\Controllers\ChiTietHoaDonNhapController;
use App\Http\Controllers\APIAuthController;;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('trangchu');
});


Route::get('reset-password/{token}',[APIAuthController::class,'ResetMatKhau'])->name('reset-password');
Route::post('reset-password-post',[APIAuthController::class,'ResetMatKhauPost'])->name('reset-password-post');


//loại sản phẩm
Route::middleware('auth')->group(function () {
    Route::prefix('loai-san-pham')->group(function (){
        Route::name('loai-san-pham.')->group(function (){
        Route::get('them-moi',[LoaiSanPhamController::class,'ThemMoiLoaiSp'])->name('them-moi');
        Route::post('them-moi',[LoaiSanPhamController::class,'XuLyThemMoiLoai'])->name('xl-them-moi');
        Route::get('danh-sach',[LoaiSanPhamController::class,'DanhSachLoaiSp'])->name('danh-sach');
        Route::get('xoa/{id}', [LoaiSanPhamController::class, 'XoaLoaiSp'])->name('xoa');
        Route::get('cap-nhat/{id}', [LoaiSanPhamController::class, 'CapNhatLoaiSp'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [LoaiSanPhamController::class, 'XuLyCapNhatLoaiSp'])->name('xl-cap-nhat');
        });
    });
});
//sản phẩm

// Route::middleware('auth')->group(function () {
    Route::prefix('san-pham')->group(function (){
        Route::name('san-pham.')->group(function (){
        Route::get('danh-sach',[SanPhamController::class,'DanhSachSp'])->name('danh-sach');
        Route::get('them-moi',[SanPhamController::class,'ThemMoiSp'])->name('them-moi');
        Route::post('them-moi',[SanPhamController::class,'xuLyThemMoiSp'])->name('xl-them-moi');

        Route::get('XoaSp/{id}', [SanPhamController::class, 'XoaSp'])->name('xoa');
        Route::get('cap-nhat/{id}', [SanPhamController::class, 'CapNhatSp'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhatSp'])->name('xl-cap-nhat');


        Route::get('xem-anh/{id}', [SanPhamController::class, 'XemAnh'])->name('xem-anh');
        Route::get('cap-nhat-anh/{id}',[SanPhamController::class,'CapNhatAnh'])->name('cap-nhat-anh');
        Route::post('cap-nhat-anh/{id}',[SanPhamController::class,'XuLyCapNhatAnh'])->name('xl-cap-nhat-anh');
        Route::get('xoa-anh/{id}',[SanPhamController::class,'XoaAnh'])->name('xoa-anh');
        });
    });
// });


//Hóa đơn xuất
Route::get('hoa-don-xuat/them-moi',[HoaDonXuatController::class,'HoaDon'])->name('hoa-don-xuat.them-moi');
Route::post('hoa-don-xuat/them-moi',[HoaDonXuatController::class,'xuLyThemMoiHD'])->name('xuly.them-moi');
Route::get('hoa-don-xuat/danh-sach',[HoaDonXuatController::class,'DanhSach'])->name('hoa-don-xuat.danh-sach');
//Admin
Route::get('/', [DangNhapController::class, 'trangchu'])->name('trang-chu')->middleware('auth');
Route::get('admin/dang-nhap', [DangNhapController::class, 'DangNhap'])->name('admin.dang-nhap')->middleware('guest');
Route::post('admin/dang-nhap', [DangNhapController::class, 'XuLyDangNhap'])->name('admin.xl-dang-nhap')->middleware('guest');
Route::get('admin/dang-xuat', [DangNhapController::class, 'DangXuat'])->name('admin.dang-xuat')->middleware('auth');
//Nhà Cung Cấp
Route::middleware('auth')->group(function () {
    Route::prefix('nha-cung-cap')->group(function (){
        Route::name('nha-cung-cap.')->group(function (){
            Route::get('them-moi',[NhaCungCapController::class,'ThemMoiNCC'])->name('them-moi');
            Route::post('them-moi',[NhaCungCapController::class,'XulyThemMoiNCC'])->name('xl-them-moi');
            Route::get('danh-sach',[NhaCungCapController::class,'DanhSachNCC'])->name('danh-sach');
            Route::get('xoa/{id}', [NhaCungCapController::class, 'XoaLoaiNCC'])->name('xoa');
            Route::get('cap-nhat/{id}', [NhaCungCapController::class, 'CapNhatNCC'])->name('cap-nhat');
            Route::post('cap-nhat/{id}', [NhaCungCapController::class, 'XuLyCapNhatNCC'])->name('xl-cap-nhat');
        });
    });
});

//Bình Luận
Route::get('quan-ly-binh-luan/danh-sach',[BinhLuanController::class,'DSBinhLuan'])->name('quan-ly-binh-luan.danh-sach');
Route::get('quan-ly-binh-luan/them-moi',[BinhLuanController::class,'themMoi'])->name('quan-ly-binh-luan.them-moi');

//Hóa Đơn Nhập
Route::get('hoa-don-nhap/them-moi',[HoaDonNhapController::class,'ThemHoaDonNhap'])->name('hoa-don-nhap.them-moi');
Route::post('hoa-don-nhap/them-moi',[HoaDonNhapController::class,'XuLyHoaDonNhap'])->name('xl-hoa-don-nhap.them-moi');
Route::get('hoa-don-nhap/danh-sach',[HoaDonNhapController::class,'DanhSachHoaDonNhap'])->name('hoa-don-nhap.danh-sach');
Route::get('hoa-don-nhap/xoa/{id}',[HoaDonNhapController::class,'XoaHoaDonNhap'])->name('hoa-don-nhap.xoa');

Route::get('hoa-don-nhap/chi-tiet-hoa-don-nhap/{id}',[ChiTietHoaDonNhapController::class,'XemChiTietHoaDonNhap'])->name('hoa-don-nhap.chi-tiet-hoa-don-nhap');
