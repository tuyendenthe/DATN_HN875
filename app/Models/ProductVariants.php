<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'ram',
        'memory',
        'quantity',
        'price',
        ];
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function isInFlashSale()
    {
        return $this->flashSales()->exists();
    }
    public function flashSales()
    {
        return $this->hasOne(FlashSale::class, 'product_id');
    }
    public function getFlashSalePriceByVariantId($variantId)
    {
        // Lấy flash sale cho sản phẩm biến thể theo product_variant_id
        $flashSale = FlashSale::where('product_id', $variantId)->first();

        // Nếu có flash sale thì trả về giá sale, nếu không thì trả về null
        return $flashSale ? $flashSale->price_sale : null;
    }
}
