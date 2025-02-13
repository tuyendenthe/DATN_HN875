<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\FlashSale;
use App\Models\ProductVariants;
use App\Models\Variant;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function addCart(Request $request, Product $product)
    // {
    //     // Lấy thông tin biến thể từ request
    //     $variant_id = $request->input('variant_id'); // Giả sử bạn truyền variant_id qua form
    //     $variant = Variant::find($variant_id); // Lấy chi tiết biến thể từ database
    //     dd($variant);
    //     // Tạo giỏ hàng từ session (nếu chưa có)
    //     $cart = session()->get('cart', []);

    //     // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
    //     if(isset($cart[$product->id])) {
    //         // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
    //         $cart[$product->id]['quantity'] += 1; // Tăng số lượng lên 1
    //     } else {
    //         // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng
    //         $cart[$product->id] = [
    //             'product_id' => $product->id,
    //             'product_name' => $product->name,
    //             'quantity' => 1, // Khởi tạo số lượng là 1
    //             'price' => $variant->price, // Lấy giá của biến thể
    //             'variant_name' => $variant->name, // Lưu tên biến thể
    //         ];
    //     }
    //     // dd($cart);
    //     // Lưu lại giỏ hàng vào session
    //     session()->put('cart', $cart);

    //     return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    // }

    public function addCart(Request $request, Product $product)

    {

        // $variant_id_1 = $request->input('variant_id_1');
        // $variant_id_2 = $request->input('variant_id_2');
        // $variant_id_3 = $request->input('variant_id_3');
        // $variant1 = Variant::find($variant_id_1);
        // $variant2 = Variant::find($variant_id_2);
        // $variant3 = Variant::find($variant_id_3);

        // $variant1_price = Variant::find($variant_id_1) == null ? 0 : $variant1->price;
        // $variant2_price = Variant::find($variant_id_2) == null ? 0 : $variant2->price;
        // $variant3_price = Variant::find($variant_id_3) == null ? 0 : $variant3->price;

        // $variant1_name = Variant::find($variant_id_1) == null ? '' : $variant1->name;
        // $variant2_name = Variant::find($variant_id_2) == null ? '' : $variant2->name;
        // $variant3_name = Variant::find($variant_id_3) == null ? '' : $variant3->name;

        $products = (Product::with('category', 'flashSale'))->findOrFail($product->id);
        // $categories = Category::all();
        $flashSales = FlashSale::with('product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->limit(4)
            ->get();

        // dd($product);

        $cart = session()->get('cart', []);
        $productId = $product->id; // tuyền sửa thử
        $productName = $product->name;
        if ($products->isOnFlashSale()) {
            $productPrice = $products->flashSale->price_sale;
        } else {
            $productPrice = $products->price;
        }


        //  + $variant1_price + $variant2_price + $variant3_price;
        // $variantName1 = $variant1_name;
        // $variantName2 = $variant2_name;
        // $variantName3 = $variant3_name;
        $quantity = 1;
        $image = $product->image;
        $cartItems = session('cart', []);

        // Create a unique key for the product-variant combination
        $cartKey = $productId . '-' . $productPrice;

        if (isset($cartItems[$cartKey])) {
            $cartItems[$cartKey]['quantity'] += 1;
        } else {
            $cartItems[$cartKey] = [
                'product_id' => $productId,
                'product_name' => $productName,
                // 'variant_name' => [$variantName1, $variantName2, $variantName3],
                'quantity' => $quantity,
                'price' => $productPrice,
                'image' => $image
            ];
        }

        session(['cart' => $cartItems]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng!']);
        }

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
    public function addCart1(Request $request)

    {

        $id = $request->product_variants;
        $productVariants = ProductVariants::with('product', 'flashSales')->findOrFail($id);
        //        dd($productVariants);
        $ram = $productVariants->ram;
        $memory = $productVariants->memory;
        $product = (Product::with('category', 'flashSale'))->findOrFail($productVariants->product_id);
        // $categories = Category::all();
        $flashSales = FlashSale::with('productVariants.product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->limit(4)
            ->get();
        $priceSale = FlashSale::query()->where('product_id', $id)->first();


        $cart = session()->get('cart', []);
        $productVariantsId = $id;
        $productName = $productVariants->product->name;
        if ($productVariants->isInFlashSale()) {
            $productPrice = $priceSale->price_sale;
        } else {
            $productPrice = $productVariants->price;
        }


        $quantity = 1;

        $image = $product->image;
        $id_products = $product->id;

        //         $image = $productVariants->product -> image;

        $cartItems = session('cart', []);

        // Create a unique key for the product-variant combination
        $cartKey = $productVariantsId . '-' . $productPrice;

        if (isset($cartItems[$cartKey])) {
            $cartItems[$cartKey]['quantity'] += 1;
        } else {
            $cartItems[$cartKey] = [
                'product_id' => $productVariantsId,
                'product_name' => $productName,
                'id_products' => $id_products,
                // 'variant_name' => [$variantName1, $variantName2, $variantName3],
                'quantity' => $quantity,
                'price' => $productPrice,
                'image' => $image,
                'ram' => $ram,
                'memory' => $memory
            ];
        }

        session(['cart' => $cartItems]);


        return back()->with('message1', 'Sản phẩm đã được thêm vào giỏ hàng');
    }


    public function view()
    {

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        $vouchers = Voucher::latest()->take(4)->get();
        // dd($cart);
        // Trả về view giỏ hàng
        return view('clients.cart', compact('cart','vouchers'));
    }
    // Hàm để cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateQuantity(Request $request, $key)
    {

        $cart = session()->get('cart');
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $request->quantity;
            if ($cart[$key]['quantity'] < 1) {
                $cart[$key]['quantity'] = 1; // Đặt giá trị tối thiểu là 1
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view');
    }

    // public function applyCoupon(Request $request)
    // {
    //     $voucherCode = $request->input('coupon_code');
    //     $voucher = Voucher::where('voucher_code', $voucherCode)->first();

    //     if ($voucher && $voucher->quantity > 0 ) {
    //         $discount = $voucher->price_sale;
    //         return response()->json(['success' => true, 'discount' => $discount]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Bạn không đủ điều kiện dùng hoặc hết hạn.']);
    //     }
    // }
    public function applyCoupon(Request $request)
    {
        //    dd($request->all());
        $voucherCode = $request->input('coupon_code');
        $originalPrice = $request->input('total');
        // dd($originalPrice);
        // $totalSelected = $request->input('totalSelected');
        // $checkvoucher = Voucher::where('voucher_code','=',$request->coupon_code)->first();
        // dd($totalSelected);
        // dd($checkvoucher->condition);

        //  dd($check);

        $voucher = Voucher::where('voucher_code', $voucherCode)->first();
        if ($voucher == null) {
            return response()->json(['success' => false, 'message' => 'Voucher không hợp lệ hoặc hết hạn.']);
        }
        $check =  $voucher->condition;
        //   dd($check);

        if ($voucher && $voucher !== null && $voucher->quantity > 0 && now()->between($voucher->start_date, $voucher->end_date)) {
            $discount = $voucher->price_sale;

            $finalPrice = $originalPrice - $discount;

            return response()->json([
                'success' => true,
                'discount' => $discount,

                'final_price' => $finalPrice,
                'idVoucher' => $voucher->id
            ]);
        } else {

            return response()->json(['success' => false, 'message' => 'Voucher không hợp lệ hoặc hết hạn.']);
        }
    }


    public function removeCartItem($key)
    {
        $cart = session()->get('cart');
        //        dd($cart, $key); // Kiểm tra giá trị $cart và $key

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
            session()->save();
        }
        //        dd($cart, $key); // Kiểm tra giá trị $cart và $key

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }
}
