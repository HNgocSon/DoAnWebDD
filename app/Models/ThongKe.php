<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HoaDonXuat;
class ThongKe extends Model
{
    use HasFactory;
    protected $table="thong_ke";
    public function hoa_don_xuat()
    {
        return $this->belongsTo(HoaDonXuat::class);
    }
}
