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
            $table->unsignedBigInteger('khach_hang_id');
            $table->decimal('tong_tien', 15, 2);
            $table->datetime('ngay_xuat')->nullable()->default(DB::raw('now()'));
            $table->float('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('khach_hang_id')->references('id')->on('khach_hang')->onDelete('cascade');
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
