<?php

namespace App\Http\Controllers;

use App\Models\HoaDonXuat;
use Illuminate\Http\Request;
use App\Models\ThongKe;
class RevenueController extends Controller
{
    public function index()
    {
        $khachhang=HoaDonXuat::count();
        $tongtien=HoaDonXuat::sum('tong_tien');
        return view('thong-ke/danh-sach', compact('khachhang','tongtien'));
    }

}
