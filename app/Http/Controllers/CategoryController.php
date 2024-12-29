<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $category = Category::all();
        // return view('admins.category.index', compact('category'));
        $category = Category::withTrashed()->get();
        return view('admins.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());
        // return redirect()->route('category.index')->with('success', 'Thêm thành công.');
        return redirect()->route('category.index')->with('message1', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return view('admins.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admins.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')->with('message1', 'Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();

    //     return redirect()->route('category.index')->with('message1', 'Xóa thành công.');
    // }
    public function destroy(Category $category)
    {
        Product::where('category_id', $category->id)->update(['category_id' => 1]);

        // Xóa mềm tất cả sản phẩm thuộc danh mục
        $category->products()->delete();

        // Xóa mềm danh mục
        $category->delete();

        return redirect()->route('category.index')->with('message1', 'Xóa danh mục và sản phẩm liên quan thành công.');
    }


    // public function restore(string $id)
    // {
    //     $category = Category::withTrashed()->findOrFail($id);

    //     // Khôi phục danh mục
    //     $category->restore();

    //     // Khôi phục tất cả sản phẩm thuộc danh mục
    //     $category->products()->withTrashed()->restore();

    //     return redirect()->route('category.index')->with('message1', 'Khôi phục danh mục và sản phẩm liên quan thành công.');
    // }

    public function restore(string $id)
    {
        // Tìm danh mục đã bị xóa mềm, nếu không tìm thấy sẽ báo lỗi
        $category = Category::withTrashed()->findOrFail($id);

        // Khôi phục danh mục
        $category->restore();

        // Khôi phục tất cả sản phẩm thuộc danh mục đã bị xóa mềm
        $category->products()->withTrashed()->restore();

        return redirect()->route('category.index')->with('message1', 'Khôi phục danh mục và sản phẩm liên quan thành công.');
    }
}
