<?php

namespace App\Http\Controllers;

use App\Models\Category_post;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryPosts = Category_post::all();
        return view('admins.category_post.index', compact('categoryPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.category_post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
        ]);

        Category_post::create($request->all());
        return redirect()->route('category_post.index')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $catePost = Category_post::find($id);

        return view('category_post.show',compact('catePost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catePost = Category_post::find($id);

        return view('admins.category_post.edit', compact('catePost'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $catePost = Category_post::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
        ]);

        $catePost->update($request->all());
        return redirect()->route('category_post.index')->with('update_success', 'Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catePost = Category_post::find($id);

        $catePost->delete();
        return redirect()->route('category_post.index')->with('delete_success', 'Xóa thành công.');
    }
}
