<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
    'bill_id',
    'bill_code',
    'image',
    'quantity',
    'product_name',
    'variant_name',
    'variant_id',
    'subtotal',
    'price'
];
public function variant()
{
    return $this->belongsTo(ProductVariants::class, 'variant_id');
}
    }


