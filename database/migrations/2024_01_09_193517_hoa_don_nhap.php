<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoa_don_nhap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nha_cung_cap_id');
            $table->datetime('ngay_nhap')->nullable()->default(DB::raw('now()'));
            $table->bigInteger('tong_tien');
            $table->integer('status')->default(0);;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nha_cung_cap_id')->references('id')->on('nha_cung_cap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don_nhap');
    }
};
