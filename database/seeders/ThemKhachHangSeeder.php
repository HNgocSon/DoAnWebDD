<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\KhachHang;
class ThemKhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $khachhang = new KhachHang();
        $khachhang->ten      ="Huynh Ngoc Son";
        $khachhang->sdt      ="0869787554";
        $khachhang->email    ="huynhsonqg@gmail.com";
        $khachhang->password = Hash::make('123456');
        $khachhang->dia_chi  ="Thu Duc Tp.HCM";
        $khachhang->save();
    }
}
