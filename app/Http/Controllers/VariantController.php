<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenController;

use App\Http\Controllers\CartController;
use Illuminate\Routing\Router;
use App\Http\Controllers\SearchController;
// use App\Http\Controllers\VariantController;



class VariantController extends Controller
{
    // Danh sách biến thể của sản phẩm
    public function listVariant($product_id)
    {
        $product = Product::findOrFail($product_id);
        $variants = Variant::where('product_id', $product_id)->get();
        return view('admins.variant.list', compact('variants', 'product'));
    }

    // Trang thêm mới biến thể
    public function addVariant($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('admins.variant.add', compact('product'));
    }

    // Lưu biến thể mới
    public function addPostVariant(Request $request, $product_id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Variant::create([
            'product_id' => $product_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('variants.listVariant', $product_id)->with('success', 'Thêm biến thể thành công');
    }

    // Trang chỉnh sửa biến thể
    public function editVariant($id)
    {
        $variant = Variant::findOrFail($id);
        return view('admins.variant.edit', compact('variant'));
    }

    // Cập nhật biến thể
    public function editPutVariant(Request $request, $id)
    {
        $variant = Variant::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $variant->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('variants.listVariant', $variant->product_id)->with('success', 'Cập nhật biến thể thành công');
    }

    // Xóa biến thể
    public function deleteVariant($id)
    {
        $variant = Variant::findOrFail($id);
        $variant->delete();
        return redirect()->route('variants.listVariant', $variant->product_id)->with('success', 'Xóa biến thể thành công');
    }
}
