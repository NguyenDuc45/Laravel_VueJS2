<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "ten_san_pham" => $this->faker->name(),
            "ma_san_pham" => $this->faker->numberBetween(10000, 99999),
            "gia" => $this->faker->numberBetween(100000, 999999),
            "gia_khuyen_mai" => $this->faker->numberBetween(100000, 999999),
            "so_luong" => $this->faker->randomNumber(4),
            "ngay_nhap" => $this->faker->date(),
            "mo_ta" => $this->faker->sentence(50),
            "trang_thai" => $this->faker->boolean()
        ];
    }
}
