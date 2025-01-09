<?php

namespace App\Http\Controllers;

use App\Models\ProductVariants;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use App\Models\Product;

class FlashSaleController extends Controller
{
    // Hiển thị danh sách FlashSale
    public function index()
    {
        $flashSales = FlashSale::with('productVariants.product')->get();
//        dd($flashSales);
        return view('admins.flash_sale.index', compact('flashSales'));
    }

    // Hiển thị chi tiết FlashSale theo ID
    public function show($id)
    {
        $flashSale = FlashSale::with('productVariants.product')->findOrFail($id);
//        $products = Product::all();
        return view('admins.flash_sale.show', compact('flashSale' ));
    }

    // Hiển thị form tạo mới FlashSale
    public function create()
    {
        $productVariants = ProductVariants::with('product')
            ->whereHas('product') // Lấy những bản ghi có quan hệ product
            ->get();
        return view('admins.flash_sale.create', compact('productVariants'));
    }

    // Lưu FlashSale mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
//        dd($request);
        // Validate incoming request
        $request->validate([
            'product_id' => 'required|integer|unique:flash_sales,product_id',
            'time_end' => 'required|date',
            'percent' => 'required|integer',
        ]);

        // Lấy giá gốc của sản phẩm từ bảng products
        $product = ProductVariants::find($request->product_id);

        if (!$product) {
            return redirect()->route('flash_sale.index')
                            ->with('message1', 'Sản phẩm không tồn tại.');
        }

        // Tính toán giá gốc và giá sale
        $price_original = $product->price;
        $price_sale = $price_original - ($price_original * $request->percent / 100);

        // Tạo FlashSale mới với giá trị tính toán
        FlashSale::create([
            'product_id' => $request->product_id,
            'time_end' => $request->time_end,
            'price_original' => $price_original,
            'price_sale' => $price_sale,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

//        $product->update(attributes: ['price' => $price_sale]);

        return redirect()->route('flash_sale.index')
                        ->with('message1', 'Tạo sản phẩm Flash sale thành công');

    }


    // Cập nhật thông tin FlashSale
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'product_id' => 'required|integer|unique:flash_sales,product_id,' . $id,
            'time_end' => 'required|date',
            'percent' => 'required|integer',
        ]);

        // Lấy FlashSale hiện tại
        $flashSale = FlashSale::findOrFail($id);

        // Lấy giá gốc của sản phẩm từ bảng products
        $product = ProductVariants::find($request->product_id);

        if (!$product) {
            return redirect()->route('flash_sale.index')
                            ->with('message', 'Sản phẩm không tồn tại.');
        }

        // Tính toán lại giá gốc và giá sale
        $price_original = $product->price;
        $price_sale = $price_original - ($price_original * $request->percent / 100);

        // Cập nhật FlashSale với các giá trị mới
        $flashSale->update([
            'product_id' => $request->product_id,
            'time_end' => $request->time_end,
            'price_original' => $price_original,
            'price_sale' => $price_sale,
            'updated_at' => now(),
        ]);

//        $product->update(attributes: ['price' => $price_sale]);

        return redirect()->route('flash_sale.index')
                        ->with('message1', 'Cập nhật Flash Sale sản phẩm thành công.');
    }

    // Xóa FlashSale theo ID
    public function delete($id)
    {
        $flashSale = FlashSale::findOrFail($id);

//        $product = Product::find($flashSale->product_id);

//        $product->update(attributes: ['price' => $flashSale->price_original]);

        $flashSale->delete();

        return redirect()->route('flash_sale.index')
                         ->with('message1', 'Xóa flash sale thành công.');
    }
}
