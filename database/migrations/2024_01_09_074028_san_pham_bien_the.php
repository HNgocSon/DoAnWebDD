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
        Schema::create('san_pham_bien_the', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('san_pham_id');
        $table->bigInteger('gia');
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
        $table->softDeletes();

        $table->foreign('san_pham_id')->references('id')->on('san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_bien_the');
    }
};
