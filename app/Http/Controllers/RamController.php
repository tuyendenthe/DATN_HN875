<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rams = Ram::all();
        return view('admins.rams.index', compact('rams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.rams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ram::create($request->all());
        return redirect()->route('rams.index')->with('message1', 'Thêm ram thành công');
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
        $rams = Ram::find($id);

        return view('admins.rams.edit', compact('rams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ram = Ram::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ram->update($request->all());

        return redirect()->route('rams.index')->with('message1', 'Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ram = Ram::findOrFail($id);

        // Cập nhật tất cả các sản phẩm có ram_id thành 1
        Product::where('ram_id', $ram->id)->update(['ram_id' => 1]);

        // Xóa RAM
        $ram->delete();

        return redirect()->route('rams.index')->with('success', 'RAM đã được xóa và sản phẩm liên quan đã được cập nhật.');
    }
}
