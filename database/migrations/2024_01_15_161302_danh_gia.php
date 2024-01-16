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
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->unsignedBigInteger('san_pham_id');
            $table->unsignedBigInteger('so_sao');
            $table->string('comments');
            $table->dateTime('thoi_gian')->default(DB::raw('now()'));
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('khach_hang_id')->references('id')->on('khach_hang')->onDelete('cascade');
            $table->foreign('san_pham_id')->references('id')->on('san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};
