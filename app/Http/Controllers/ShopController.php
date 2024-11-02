<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $products = Product::latest()->take(8)->get();
        $categories = Category::get();

        return view('clients.shop', compact('products', 'categories'));
    }
}
