<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
  public $items = [];
  public $totalPrice = 0;
  public $totalQuantity = 0;
  public function __construct(){
    $this->totalPrice = 5000;
  }
  public function add($product, $variant = null){
    // Bạn có thể thêm logic để xử lý thông tin sản phẩm và biến thể vào giỏ hàng
    dd([
        'product' => $product,
        'variant' => $variant,
    ]);
}

  public function update(){

  }
  public function delete(){

  }
  public function clear(){

  }
}
