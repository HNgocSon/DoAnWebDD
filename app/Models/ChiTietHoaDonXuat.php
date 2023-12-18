<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonXuat extends Model
{
    use HasFactory;
    protected $table="chi_tiet_hoa_don_nhap";

    protected $fillable = [
        'status',
    ];

    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }

    public function hoa_don_xuat(){
        return $this->belongsto(HoaDonXuat::class);
    }
}
