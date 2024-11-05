<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\FlashSale;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        // dd($cart);
        // Lấy tối đa 10 sản phẩm từ bảng products
        $products = (Product::with('category'))->latest()->take(8)->get();
        // dd($products);
        // dd($products);
        $flashSales = FlashSale::with('product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->limit(4)
            ->get();
        $banners = Slide::all();

        // Trả về view và truyền danh sách sản phẩm
        return view('clients.index', compact('products', 'flashSales', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */

    //  Chi tiết sản phẩm

    public function show(string $id)
    {
        $products = Product::with('variants')->findOrFail($id);

        return view('clients.single_product', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
