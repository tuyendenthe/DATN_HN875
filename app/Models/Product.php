<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image','price', 'content', 'content_short'];

    // Product.php
public function variants()
{
    return $this->hasMany(Variant::class);
}

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
}
