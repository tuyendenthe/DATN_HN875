<?php
namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    // list
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admins.vouchers.index', compact('vouchers'));
    }

    //add
    public function create()
    {
        return view('admins.vouchers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string|max:255|unique:vouchers',
            'quantity' => 'required|integer',
            'price_sale' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'discount_type' => 'required|string|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
        ]);

        Voucher::create($request->all());
        return redirect()->route('admin1.vouchers.index')->with('success', 'Voucher đã được thêm thành công.');
    }

//    update
    public function edit(Voucher $voucher)
    {
        return view('admins.vouchers.edit', compact('voucher'));
    }



public function update(Request $request, Voucher $voucher)
{
    $request->validate([
        'voucher_code' => 'required|string|max:255|unique:vouchers,voucher_code,' . $voucher->id,
        'quantity' => 'required|integer',
        'price_sale' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'discount_type' => 'required|string|in:percentage,fixed',
        'discount_value' => 'required|numeric|min:0',
    ]);

    $voucher->update($request->all());
    return redirect()->route('admin1.vouchers.index')->with('success', 'Voucher đã được cập nhật thành công.');
}

    // delete
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admins.vouchers.index')->with('success', 'Voucher đã được xóa thành công.');
    }
}
