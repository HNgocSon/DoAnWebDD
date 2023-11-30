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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->integer('loai_san_pham_id');
            $table->float('gia');
            $table->string('mo_ta');
            $table->integer('so_luong')->default(0);
            $table->string('mau');
            $table->string('man_hinh');
            $table->string('camera');
            $table->string('he_dieu_hanh');
            $table->string('chip');
            $table->string('ram');
            $table->string('dung_luong');
            $table->string('pin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
