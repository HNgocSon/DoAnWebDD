<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table="loai_san_pham";

    public function ds_san_pham()
    {
        return $this->hasMany(SanPham::class);
    }
}
