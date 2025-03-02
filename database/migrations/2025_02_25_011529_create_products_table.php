<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Mặc định trong 1 file migration bắt buộc phải có hàm up và down

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("ten_san_pham");
            $table->string("ma_san_pham", 20)->unique();
            $table->unsignedDecimal("gia", 10, 2);
            $table->unsignedDecimal("gia_khuyen_mai", 10, 2)->nullable();
            $table->string("hinh_anh")->nullable();
            $table->unsignedInteger("so_luong");
            $table->date("ngay_nhap");
            $table->text("mo_ta")->nullable();
            $table->boolean("trang_thai")->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
