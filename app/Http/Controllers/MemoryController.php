<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use App\Models\Product;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memories = Memory::all();
        return view('admins.memories.index', compact('memories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.memories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Memory::create($request->all());
        return redirect()->route('memories.index')->with('message1', 'Thêm bộ nhớ thành công');
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
        $memories = Memory::find($id);

        return view('admins.memories.edit', compact('memories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $memories = Memory::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $memories->update($request->all());

        return redirect()->route('memories.index')->with('message1', 'Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memories = Memory::findOrFail($id);

        // Cập nhật tất cả các sản phẩm có ram_id thành 1
        Product::where('memory_id', $memories->id)->update(['memory_id' => 1]);

        // Xóa RAM
        $memories->delete();

        return redirect()->route('memories.index')->with('success', 'Memory đã được xóa và sản phẩm liên quan đã được cập nhật.');
    }
}
