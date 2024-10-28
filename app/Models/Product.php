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
    protected $fillable = ['name', 'image', 'content', 'price', 'content_short'];

    // Product.php
public function variants()
{
    return $this->hasMany(Variant::class);
}

public function category() {
    return $this->belongsTo(Category::class);
}

}
