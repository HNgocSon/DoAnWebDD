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
            $table->unsignedBigInteger('loai_san_pham_id');
            $table->float('gia',30);
            $table->string('mo_ta',100);
            $table->integer('so_luong')->default(0);
            $table->string('mau',20);
            $table->string('man_hinh',20);
            $table->string('camera');
            $table->string('he_dieu_hanh',20);
            $table->string('chip',20);
            $table->string('ram',20);
            $table->string('dung_luong',20);
            $table->string('pin',20);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('loai_san_pham_id')->references('id')->on('loai_san_pham')->onDelete('cascade');

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
