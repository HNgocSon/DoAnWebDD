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
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('khach_hang_id');
            $table->unsignedBigInteger('san_pham_id');
            $table->unsignedBigInteger('san_pham_bien_the_id');
            $table->integer('so_luong');
            $table->timestamps();

            $table->foreign('khach_hang_id')->references('id')->on('khach_hang')->onDelete('cascade');
            $table->foreign('san_pham_id')->references('id')->on('san_pham')->onDelete('cascade');
            $table->foreign('san_pham_bien_the_id')->references('id')->on('san_pham_bien_the')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hang');
    }
};
