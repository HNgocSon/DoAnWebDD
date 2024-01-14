<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamYeuThich extends Model
{
    use HasFactory;
    protected $table = "san_pham_yeu_thich";

    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }

}
