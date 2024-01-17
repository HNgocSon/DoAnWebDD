<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $table = "danh_gia";
    
    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }

    public function hoa_don_xuat()
    {
        return $this->belongsTo(HoaDonXuat::class);
    }
}
