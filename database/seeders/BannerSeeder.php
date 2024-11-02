<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Slide;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 7; $i++) { 
           Slide::create([
                'image' => fake()->imageUrl(),
                'remember_token' => fake()->randomNumber(),    
           ]);
        }
    }
}
