<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
use App\Models\KhachHang;
class HoaDonXuat extends Model
{
    use HasFactory;
    protected $table="hoa_don_xuat";
    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }
    public function khach_hang(){
        return $this->belongsto(KhachHang::class);
    }
}
