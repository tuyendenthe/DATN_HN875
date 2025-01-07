<?php

namespace App\Http\Controllers;

use App\Http\Requests\variants\addVariants;
use App\Http\Requests\variants\updateVariants;
use App\Models\ProductVariants;
use Illuminate\Http\Request;

class ProductVariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
        $productId = $id;
        $data = ProductVariants::where('product_id', $id)->get();
        return view('admins.view_product_variants', compact('data','productId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $productId = $id;
        return view('admins.create_product_variants',compact('productId'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(addVariants $request)
    {
        $validatedData = $request->validated();

        // Lưu dữ liệu vào bảng product_variants
        ProductVariants::create($validatedData);

        // Chuyển hướng và hiển thị thông báo thành công
        return redirect()
            ->route('products.variants.index', $validatedData['product_id'])
            ->with('success', 'Biến thể sản phẩm đã được thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariants::findOrFail($id);

        // Trả về view chỉnh sửa với dữ liệu của biến thể
        return view('admins.edit_product_variants', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateVariants $request, string $id)
    {
        $validatedData = $request->validated();

        // Tìm và cập nhật dữ liệu
        $variant = ProductVariants::findOrFail($id);
        $variant->update($validatedData);

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()
            ->route('products.variants.index', $variant->product_id)
            ->with('success', 'Biến thể sản phẩm đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariants::findOrFail($id);
        $variant->delete();

        // Chuyển hướng về danh sách biến thể sản phẩm với thông báo thành công
        return redirect()
            ->route('products.variants.index', $variant->product_id)
            ->with('success', 'Biến thể sản phẩm đã được xóa thành công.');
    }
}
