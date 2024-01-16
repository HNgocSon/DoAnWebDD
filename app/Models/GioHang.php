<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio_hang';

    protected $fillable = ['khach_hang_id', 'san_pham_id', 'san_pham_bien_the_id', 'so_luong'];

    public function san_pham()
    {
        return $this->belongsTo(SanPham::class);
    }

    public function san_pham_bien_the()
    {
        return $this->belongsTo(SanPhamBienThe::class);
    }
}
