<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIds = range(33, 77); // Các product_id từ 33 đến 77

        foreach ($productIds as $productId) {
            DB::table('product_variants')->insert([
                [
                    'product_id' => $productId,
                    'ram' => 8,
                    'memory' => 240,
                    'price' => rand(500000, 2000000), // Giá ngẫu nhiên trong khoảng hợp lý
                    'quantity' => rand(20, 100),
                ],
                [
                    'product_id' => $productId,
                    'ram' => 16,
                    'memory' => 520,
                    'price' => rand(500000, 2000000),
                    'quantity' => rand(20, 100),
                ],
            ]);
        }
    }
}
