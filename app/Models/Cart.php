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
  public function add($product){
    dd($product);
  }
  public function update(){

  }
  public function delete(){

  }
  public function clear(){

  }
}
