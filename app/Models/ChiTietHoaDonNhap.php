<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
use App\Models\HoaDon;
class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table="chi_tiet_hoa_don_nhap";

    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }

    public function hoa_don_nhap(){
        return $this->belongsto(HoaDonNhap::class);
    }
}
