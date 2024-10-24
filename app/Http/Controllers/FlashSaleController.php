<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashSale;
use App\Models\Product;

class FlashSaleController extends Controller
{
    // Hiển thị danh sách FlashSale
    public function index()
    {
        $flashSales = FlashSale::with('product')->get();
        return view('admins.flash_sale.index', compact('flashSales'));
    }

    // Hiển thị chi tiết FlashSale theo ID
    public function show($id)
    {
        $flashSale = FlashSale::findOrFail($id);
        $products = Product::all();
        return view('admins.flash_sale.show', compact('flashSale', 'products'));
    }

    // Hiển thị form tạo mới FlashSale
    public function create()
    {
        $products = Product::all();
        return view('admins.flash_sale.create', compact('products'));
    }

    // Lưu FlashSale mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'time_end' => 'required|date',
        ]);

        FlashSale::create($request->all());

        return redirect()->route('flash_sale.index')
                         ->with('success', 'Tạo sản phẩm Flash sale thành công');
    }

    // Cập nhật thông tin FlashSale
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'time_end' => 'required|date',
        ]);

        $flashSale = FlashSale::findOrFail($id);
        $flashSale->update($request->all());

        return redirect()->route('flash_sale.index')
                         ->with('success', 'Cập nhật Flash Sale sản phẩm thành công.');
    }

    // Xóa FlashSale theo ID
    public function delete($id)
    {
        $flashSale = FlashSale::findOrFail($id);
        $flashSale->delete();

        return redirect()->route('flash_sale.index')
                         ->with('success', 'Flash sale deleted successfully.');
    }
}
