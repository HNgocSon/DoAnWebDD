<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamBienThe extends Model
{
    use HasFactory;

    protected $table = "san_pham_bien_the";

    public function san_pham(){
        return $this->belongsto(SanPham::class);
    }
}
