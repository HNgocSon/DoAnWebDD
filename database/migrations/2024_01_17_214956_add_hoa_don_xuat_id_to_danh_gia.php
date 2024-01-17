<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHoaDonXuatIdToDanhGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('danh_gia', function (Blueprint $table) {
            $table->unsignedBigInteger('hoa_don_xuat_id')->nullable();

            $table->foreign('hoa_don_xuat_id')
                  ->references('id')
                  ->on('hoa_don_xuat')
                  ->onDelete('cascade');

    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('danh_gia', function (Blueprint $table) {
            $table->dropForeign(['hoa_don_xuat_id']);
            $table->dropColumn('hoa_don_xuat_id');
        });
    }
};
