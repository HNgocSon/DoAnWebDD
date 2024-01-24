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
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\QuanLyKhachHangController;
use App\Http\Controllers\QuanLyAdminController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\DangNhapGoogleController;
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
})->name('trang-chu');



Route::get('/auth/google', [DangNhapGoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [DangNhapGoogleController::class, 'handleGoogleCallback']);


Route::get('thong-Bao}',[APIAuthController::class,'ThongBao'])->name('thong-bao');
Route::get('reset-password/{token}',[APIAuthController::class,'ResetMatKhau'])->name('reset-password');
Route::post('reset-password-post',[APIAuthController::class,'ResetMatKhauPost'])->name('reset-password-post');
Route::get('/accept/{khachhang}/{token}',[APIAuthController::class,'Accept'])->name('khach-hang.accept');

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
        Route::get('search', [LoaiSanPhamController::class, 'Search'])->name('search');
        });
    });
});

//sản phẩm
Route::middleware('auth')->group(function () {
    Route::prefix('san-pham')->group(function (){
        Route::name('san-pham.')->group(function (){
        Route::get('danh-sach',[SanPhamController::class,'DanhSachSp'])->name('danh-sach');
        Route::get('them-moi',[SanPhamController::class,'ThemMoiSp'])->name('them-moi');
        Route::post('them-moi',[SanPhamController::class,'xuLyThemMoiSp'])->name('xl-them-moi');


        Route::get('bien-the/{id}', [SanPhamController::class, 'BienThe'])->name('bien-the');
        Route::get('them-moi-bien-the/{id}',[SanPhamController::class,'ThemMoiBienThe'])->name('them-moi-bien-the');
        Route::post('them-moi-bien-the/{id}',[SanPhamController::class,'xuLyThemMoiBienThe'])->name('xl-them-moi-bien-the');
        Route::get('cap-nhat-bien-the/{id}',[SanPhamController::class,'CapNhatBienThe'])->name('cap-nhat-bien-the');
        Route::post('cap-nhat-bien-the/{id}',[SanPhamController::class,'XuLyCapNhatBienThe'])->name('xl-cap-nhat-bien-the');
        Route::get('xoa-bien-the/{id}',[SanPhamController::class,'XoaBienThe'])->name('xoa-bien-the');

        Route::get('search', [SanPhamController::class, 'Search'])->name('search');

        Route::get('XoaSp/{id}', [SanPhamController::class, 'XoaSp'])->name('xoa');
        Route::get('cap-nhat/{id}', [SanPhamController::class, 'CapNhatSp'])->name('cap-nhat');
        Route::post('cap-nhat/{id}', [SanPhamController::class, 'xuLyCapNhatSp'])->name('xl-cap-nhat');


        Route::get('xem-anh/{id}', [SanPhamController::class, 'XemAnh'])->name('xem-anh');
        Route::get('cap-nhat-anh/{id}',[SanPhamController::class,'CapNhatAnh'])->name('cap-nhat-anh');
        Route::post('cap-nhat-anh/{id}',[SanPhamController::class,'XuLyCapNhatAnh'])->name('xl-cap-nhat-anh');
        Route::get('xoa-anh/{id}',[SanPhamController::class,'XoaAnh'])->name('xoa-anh');
        });
    });
});


//Hóa đơn xuất
Route::middleware('auth')->group(function () {
    Route::prefix('hoa-don-xuat')->group(function (){
        Route::name('hoa-don-xuat.')->group(function (){
            Route::get('danh-sach',[HoaDonXuatController::class,'DanhSach'])->name('danh-sach');
            Route::get('chi-tiet/{id}',[HoaDonXuatController::class,'ChiTietHoaDonXuat'])->name('chi-tiet');
            Route::get('xoa/{id}',[HoaDonXuatController::class,'XoaHoaDonXuat'])->name('xoa');
            Route::put('/hoa-don-xuat/{id}/thay-doi-trang-thai', [HoaDonXuatController::class, 'ThayDoiTrangThaiDon'])->name('thay-doi-trang-thai');
        });
    });
});

//Admin
Route::get('/', [DangNhapController::class, 'trangchu'])->name('trang-chu')->middleware('auth');
Route::get('admin/dang-nhap', [DangNhapController::class, 'DangNhap'])->name('admin.dang-nhap')->middleware('guest');
Route::post('admin/dang-nhap', [DangNhapController::class, 'XuLyDangNhap'])->name('admin.xl-dang-nhap')->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function (){
        Route::name('admin.')->group(function (){
            Route::get('dang-xuat', [DangNhapController::class, 'DangXuat'])->name('dang-xuat')->middleware('auth');
            Route::get('them-moi', [QuanLyAdminController::class, 'ThemMoiAdmin'])->name('them-moi')->middleware('auth');
            Route::post('them-moi', [QuanLyAdminController::class, 'XuLyThemMoiAdmin'])->name('xl-them-moi')->middleware('auth');
            Route::get('danh-sach', [QuanLyAdminController::class, 'DanhSachAdmin'])->name('danh-sach')->middleware('auth');
            Route::get('cap-nhat/{id}', [QuanLyAdminController::class, 'CapNhatAdmin'])->name('cap-nhat')->middleware('auth');
            Route::post('cap-nhat/{id}', [QuanLyAdminController::class, 'XuLyCapNhatAdmin'])->name('xl-cap-nhat')->middleware('auth');
            Route::get('xoa/{id}', [QuanLyAdminController::class, 'XoaAdmin'])->name('xoa');
            Route::get('search', [QuanLyAdminController::class, 'Search'])->name('search');
        });
    });
});



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
            Route::get('search', [NhaCungCapController::class, 'Search'])->name('search');
        });
    });
});

//Bình Luận

Route::middleware('auth')->group(function () {
    Route::prefix('binh-luan')->group(function (){
        Route::name('binh-luan.')->group(function (){
            Route::get('danh-sach',[BinhLuanController::class,'DanhSachBinhLuan'])->name('danh-sach');
            Route::get('xoa/{id}',[BinhLuanController::class,'XoaBinhLuan'])->name('xoa');
        });
    });
});

//Hóa Đơn Nhập
Route::middleware('auth')->group(function () {
    Route::prefix('hoa-don-nhap')->group(function (){
        Route::name('hoa-don-nhap.')->group(function (){
            Route::get('them-moi',[HoaDonNhapController::class,'ThemHoaDonNhap'])->name('them-moi');
            Route::get('lay-ds-bien-the/{id}',[HoaDonNhapController::class,'BienThe'])->name('bien-the');
            Route::post('them-moi',[HoaDonNhapController::class,'XuLyHoaDonNhap'])->name('xl-them-moi');
            Route::get('danh-sach',[HoaDonNhapController::class,'DanhSachHoaDonNhap'])->name('danh-sach');
            Route::get('xoa/{id}',[HoaDonNhapController::class,'XoaHoaDonNhap'])->name('xoa');
            Route::get('search', [HoaDonNhapController::class, 'Search'])->name('search');
            Route::get('chi-tiet-hoa-don-nhap/{id}',[HoaDonNhapController::class,'XemChiTietHoaDonNhap'])->name('chi-tiet-hoa-don-nhap');
        });
    });
});

//Khách Hàng
Route::middleware('auth')->group(function () {
    Route::prefix('khach-hang')->group(function (){
        Route::name('khach-hang.')->group(function (){
            Route::get('danh-sach',[QuanLyKhachHangController::class,'DanhSachKhachHang'])->name('danh-sach');
            Route::get('xoa/{id}',[QuanLyKhachHangController::class,'XoaTaiKhoan'])->name('xoa');
            Route::get('chi-tiet/{id}',[QuanLyKhachHangController::class,'ChiTietKhachHang'])->name('chi-tiet');
            Route::get('search', [QuanLyKhachHangController::class, 'Search'])->name('search');
        });
    });
});

Route::get('thong-ke/danh-sach', [ThongKeController::class, 'index'])->name('thong-ke.danh-sach');
Route::get('thong-ke/doanh-so-ban-hang', [ThongKeController::class, 'DoanhSoBanHang'])->name('thong-ke.doanh-so-ban-hang');
Route::get('thong-ke/so-luong-ton-kho', [ThongKeController::class, 'SoLuongTonKho'])->name('thong-ke.so-luong-ton-kho');
