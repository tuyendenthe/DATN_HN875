<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'image',
        'content',
        'status',
        'chip',
        'color',
        'screen',
        'resolution',
        'content_short',
        'role',

    ];

    // Product.php
    // public function variants()
    // {
    //     return $this->hasMany(Variant::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function reviews()
    {
        return $this->hasMany(Comment::class);
    }
    public function averageRating()
    {
        // Tính trung bình của cột 'star' chỉ với các đánh giá có status = 1
        return $this->reviews()->where('status', 1)->avg('star');
    }


    // public function Categories()
    // {
    //     return $this->belongsTo(Categories::class, 'cate_id');
    // }
    public function flashSale()
    {
        return $this->hasOne(FlashSale::class, 'product_id');
    }

    public function isOnFlashSale()
    {
        return $this->flashSale && $this->flashSale->time_end > Carbon::now();
    }

    public function flashSales()
    {
        return $this->hasMany(FlashSale::class, 'product_id', 'id'); // Giả sử 'product_id' là khoá ngoại

//     public function rams() {
//         return $this->belongsTo(Ram::class, 'ram_id');
//     }
//     public function memories() {
//         return $this->belongsTo(Memory::class, 'memory_id');

    }
    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }
    public function hasVariantsInFlashSale()
    {
        // Lấy danh sách các biến thể của sản phẩm
        $variants = $this->variants;

        // Duyệt qua từng biến thể và kiểm tra xem biến thể đó có trong flash sale không
        foreach ($variants as $variant) {
            if ($variant->isInFlashSale()) {
                return true;
            }
        }

        return false;

    }
    // public function variantss()
    // {
    //     return $this->hasMany(ProductVariants::class, 'product_id', 'id');
    // }

}
