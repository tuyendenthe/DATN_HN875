<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Tạo 10 sản phẩm ngẫu nhiên
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'category_id' => Category::inRandomOrder()->first()->id ?? null, // Chọn ngẫu nhiên một category hoặc null
                'variant_id' => Variant::inRandomOrder()->first()->id ?? null,   // Chọn ngẫu nhiên một variant hoặc null
                'name' => $faker->word(),
                'image' => $faker->imageUrl(640, 480, 'product', true),         // Tạo đường dẫn ảnh ngẫu nhiên
                'price' => $faker->randomFloat(2, 10, 1000),                   // Tạo giá sản phẩm ngẫu nhiên
                'content' => $faker->paragraph(),
                'content_short' => $faker->sentence(),
                'role' => $faker->numberBetween(1, 5),                         // Tạo giá trị role ngẫu nhiên
            ]);
        }
    }
}
