<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_index()
    {
        $response = $this->getJson('/api/product');

        $response
            // Kiểm tra response trả về
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            // Kiểm tra cấu trúc JSON trả về
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'ten_san_pham',
                    'ma_san_pham',
                    'gia',
                    'gia_khuyen_mai',
                    'hinh_anh',
                    'so_luong',
                    'ngay_nhap',
                    'mo_ta',
                    'trang_thai',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            ]);
    }

    public function test_store()
    {
        // Fake dữ liệu
        $data = [
            'ten_san_pham' => "Sản phẩm 1",
            'ma_san_pham' => "SP001",
            'gia' => 10000,
            'gia_khuyen_mai' => 9999,
            'hinh_anh' => "img1.png",
            'so_luong' => 100,
            'ngay_nhap' => "2025-03-01 00:00:00",
            'mo_ta' => "Mô tả 1",
            'trang_thai' => 1,
        ];

        $response = $this->postJson('/api/product', $data);

        // Kiểm tra response trả về
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Thêm thành công',
                'product' => [
                    'ten_san_pham' => "Sản phẩm 1",
                    'ma_san_pham' => "SP001",
                    'gia' => 10000,
                    'gia_khuyen_mai' => 9999,
                    'hinh_anh' => "img1.png",
                    'so_luong' => 100,
                    'ngay_nhap' => "2025-03-01 00:00:00",
                    'mo_ta' => "Mô tả 1",
                    'trang_thai' => 1,
                ]
            ]);

        // Kiểm tra xem sản phẩm đã được lưu vào database hay chưa
        $this->assertDatabaseHas('products', $data);
    }

    public function test_show()
    {
        // Tạo dữ liệu giả trong database
        $data = Product::factory()->create([
            'ten_san_pham' => "Sản phẩm 1",
            'ma_san_pham' => "SP001",
            'gia' => 10000,
            'gia_khuyen_mai' => 9999,
            'hinh_anh' => "img1.png",
            'so_luong' => 100,
            'ngay_nhap' => "2025-03-01 00:00:00",
            'mo_ta' => "Mô tả 1",
            'trang_thai' => 1,
        ]);

        $response = $this->getJson("/api/product/{$data->id}");

        // Kiểm tra response trả về
        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'ten_san_pham',
                'ma_san_pham',
                'gia',
                'gia_khuyen_mai',
                'hinh_anh',
                'so_luong',
                'ngay_nhap',
                'mo_ta',
                'trang_thai',
                'created_at',
                'updated_at',
                'deleted_at'
            ]);
    }

    public function test_update()
    {
        // Tạo dữ liệu giả trong database
        $data = Product::factory()->create([
            'ten_san_pham' => "Sản phẩm 1",
            'ma_san_pham' => "SP001",
            'gia' => 10000,
            'gia_khuyen_mai' => 9999,
            'hinh_anh' => "img1.png",
            'so_luong' => 100,
            'ngay_nhap' => "2025-03-01 00:00:00",
            'mo_ta' => "Mô tả 1",
            'trang_thai' => 1,
        ]);

        // Dữ liệu cập nhật
        $updatedData = [
            'ten_san_pham' => "Sản phẩm 2",
            'ma_san_pham' => "SP002",
            'gia' => 20000,
            'gia_khuyen_mai' => 999,
            'hinh_anh' => "img2.png",
            'so_luong' => 200,
            'ngay_nhap' => "2025-03-02 00:00:00",
            'mo_ta' => "Mô tả 2",
            'trang_thai' => 0,
        ];

        $response = $this->putJson("/api/product/{$data->id}", $updatedData);

        // Kiểm tra response trả về
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Sửa thành công',
                'product' => [
                    'id' => $data->id,
                    'ten_san_pham' => "Sản phẩm 2",
                    'ma_san_pham' => "SP002",
                    'gia' => 20000,
                    'gia_khuyen_mai' => 999,
                    'hinh_anh' => "img2.png",
                    'so_luong' => 200,
                    'ngay_nhap' => "2025-03-02 00:00:00",
                    'mo_ta' => "Mô tả 2",
                    'trang_thai' => 0,
                ]
            ]);

        // Kiểm tra dữ liệu đã được cập nhật trong database hay chưa
        $this->assertDatabaseHas('products', $updatedData);
    }

    public function test_destroy()
    {
        // Tạo dữ liệu giả trong database
        $data = Product::factory()->create([
            'ten_san_pham' => "Sản phẩm 1",
            'ma_san_pham' => "SP001",
            'gia' => 10000,
            'gia_khuyen_mai' => 9999,
            'hinh_anh' => "img1.png",
            'so_luong' => 100,
            'ngay_nhap' => "2025-03-01 00:00:00",
            'mo_ta' => "Mô tả 1",
            'trang_thai' => 1,
        ]);

        $response = $this->deleteJson("/api/product/{$data->id}");

        // Kiểm tra response trả về
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Xóa thành công',
            ]);
    }
}
