<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'time_end',
        'price_original',
        'price_sale'
    ];

    public function productVariants()
    {
        return $this->belongsTo(ProductVariants::class,'product_id');
    }
}
