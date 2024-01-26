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
        Schema::table('san_pham_yeu_thich', function (Blueprint $table) {
            $table->unsignedBigInteger('san_pham_bien_the_id');
            $table->foreign('san_pham_bien_the_id')->references('id')->on('san_pham_bien_the')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham_yeu_thich', function (Blueprint $table) {
            $table->dropForeign(['san_pham_bien_the_id']);
            $table->dropColumn('san_pham_bien_the_id');
        });
    }
};
