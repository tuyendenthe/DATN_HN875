<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $cart = session()->get('cart', []);


        return view('clients.checkout', compact('request','cart'));
    }
}
