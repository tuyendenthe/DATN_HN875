<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Product $product , Cart $cart){
        $cart ->add($product);
        return redirect()->route('cart.view');
    }
    public function view(Cart $cart){
        return view('clients.cart' , compact('cart'));
    }
}
