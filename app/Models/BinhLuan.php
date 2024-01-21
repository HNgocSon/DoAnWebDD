<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table="binh_luan";
    
    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }

    public function khach_hang(){
        return $this->belongsto(KhachHang::class);
    }

    public function replies()
    {
        return $this->hasMany(BinhLuan::class, 'parent_id');
    }
}
