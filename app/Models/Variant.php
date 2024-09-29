<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    // Product.php
public function variants()
{
    return $this->hasMany(Variant::class);
}



    protected $fillable = ['product_id', 'name', 'price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
