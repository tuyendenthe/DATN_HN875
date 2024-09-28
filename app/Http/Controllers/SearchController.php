<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $req) {
        $products = Product::where('name', 'like', '%'. $req->keyw . '%')->get();

        return view('clients.shop', compact('products'));
    }

    public function searchProduct(Request $req) {
        $listProducts = Product::where('name', 'like', '%'. $req->keyw . '%')->get();

        return view('admins.tables', compact('listProducts'));
    }
}
