<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        "ten_san_pham",
        "ma_san_pham",
        "gia",
        "gia_khuyen_mai",
        "hinh_anh",
        "so_luong",
        "ngay_nhap",
        "mo_ta",
        "trang_thai",
        "hinh_anh"
    ];
}
