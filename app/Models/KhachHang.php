<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class KhachHang extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $table="khach_hang";
    
    public $timestamps = false;
    
    protected $fillable = [
        'status',
        'token',
        'created_at'
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
