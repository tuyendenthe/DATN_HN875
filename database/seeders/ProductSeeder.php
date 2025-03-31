<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category; // Đảm bảo rằng bạn có model Category
use App\Models\Variant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kiểm tra nếu có dữ liệu trong bảng category
        // $categoryIds = Category::pluck('id')->toArray();

        // for ($i = 0; $i < 10; $i++) {
        //     // Tạo sản phẩm
        //     $product = Product::create([
        //         'category_id' => $categoryIds ? $categoryIds[array_rand($categoryIds)] : null,
        //         'name' => 'Product ' . ($i + 1),
        //         'image' => 'product_' . ($i + 1) . '.jpg',
        //         'content' => Str::random(50),
        //         'content_short' => Str::random(20),
        //         'role' => rand(1, 5), // Giả sử role là một số ngẫu nhiên từ 1 đến 5
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);

            // Tạo 2 biến thể ngẫu nhiên cho mỗi sản phẩm
            // for ($j = 1; $j <= 2; $j++) {
            //     Variant::create([
            //         'name' => 'Variant ' . $j . ' for ' . $product->name,
            //         'price' => rand(100, 1000), // Giá ngẫu nhiên từ 100 đến 1000
            //         'quantity' => rand(1, 100), // Số lượng ngẫu nhiên từ 1 đến 100
            //         'product_id' => $product->id, // Liên kết với sản phẩm
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ]);
            // }
        // }
    }
}
