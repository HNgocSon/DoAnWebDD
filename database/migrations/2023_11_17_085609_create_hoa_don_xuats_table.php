<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoa_don_xuat', function (Blueprint $table) {
            $table->id();
            $table->date('ngay_tao');
            $table->integer('san_pham_id');
            $table->integer('khach_hang_id');
            $table->float('tong_tien');
            $table->float('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don_xuat');
    }
};
