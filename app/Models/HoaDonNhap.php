<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhaCungCap;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table="hoa_don_nhap";
    public function nha_cung_cap(){
        return $this->belongsto(NhaCungCap::class);
    }
}
