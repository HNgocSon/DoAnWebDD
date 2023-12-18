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
        Schema::create('chi_tiet_hoa_don_xuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hoa_don_xuat_id');
            $table->unsignedBigInteger('san_pham_id');
            $table->integer('so_luong');
            $table->decimal('don_gia', 10, 2);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('hoa_don_xuat_id')->references('id')->on('hoa_don_xuat')->onDelete('cascade');
            $table->foreign('san_pham_id')->references('id')->on('san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_don_xuat');
    }
};
