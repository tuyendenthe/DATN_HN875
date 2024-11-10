<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_detail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $cart = session()->get('cart', []);
        // dd($cart);

        return view('clients.checkout', compact('request', 'cart'));
    }
    public function store(Request $request)
    {
        // dd($request);

        // dd($cart);

        //         $randomString = str::upper(Str::random(5)) . Str::lower(Str::random(3)) . rand(10, 99); // Example combining letters and numbers
        // $shuffledString = Str::shuffle($randomString);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = substr(str_shuffle($characters), 0, 10);
        $bill = [
            'bill_code' => $randomString,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,

            'checkout' => $request->checkout,
            'note' => $request->note,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        Bill::create($bill);


        $product_ids = is_array($request->id_product) ? $request->id_product : [$request->id_product];

        // Lấy dữ liệu từ session cart
        $cart = session()->get('cart'); // Hoặc cách khác để lấy cart của bạn

        foreach ($product_ids as $item => $id_product) {
            // Lấy thông tin sản phẩm từ cart
            $product_id = $id_product;
            $cart_item = $cart[$product_id] ?? null; // Lấy sản phẩm dựa trên id_product
            if (!$cart_item) {
                continue; // Nếu không tìm thấy sản phẩm, bỏ qua
            }

            // Lấy variant_name
            $variants = $cart_item['variant_name'] ?? []; // Mảng variant_name

            // Gán các variant vào biến
            $variant = isset($variants[0]) ? $variants[0] : null;
            $variant1 = isset($variants[1]) ? $variants[1] : null;
            $variant2 = isset($variants[2]) ? $variants[2] : null;

            // Tạo dữ liệu để insert vào cơ sở dữ liệu
            $data2 = [
                'product_id' => $id_product,
                'bill_code' => $randomString,
                'quantity' => $request->quantity[$item],
                'subtotal' => $request->subtotal[$item],
                'variant' => $variant,
                'variant1' => $variant1,
                'variant2' => $variant2,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Thực hiện insert vào cơ sở dữ liệu
            Bill_detail::create($data2);
        }




        return redirect()->route("checkout.success")->with('success', 'Mua Hàng Thành Công');
    }
    public function ok(Request $request)
    {
        //  dd($request);


        return view('clients.Order_Success');
    }
    public function list()
    {

        $listCheckouts = DB::table('bills')
            ->join('statuses', 'bills.status', '=', 'statuses.id')
            ->where('statuses.id', '<=', 3)
            ->select('bills.*', 'statuses.status_name')
            ->get();
        // dd($list);
        return view('admins.checkout.list', compact('listCheckouts'));
    }

    public function detail($bill_code)
    {
        $detail = DB::table('bill_details')
            ->join('products', 'bill_details.product_id', '=', 'products.id')

            ->select('bill_details.*', 'products.name')
            ->get();

        // $detail = DB::table('bill_details')->where('bill_code', '=', $bill_code)->get();

        // Truy vấn thông tin người dùng từ bảng bills
        $detail_user = DB::table('bills')->where('bill_code', '=', $bill_code)->first();
        // dd($detail);
        // dd($detail_user);
        return view('admins.checkout.detail', compact('detail_user', 'detail'));
    }
    public function edit()
    {
        //  dd($request);


        return view('admins.checkout.history');
    }
    public function editput()
    {
        //  dd($request);


        return view('admins.checkout.history');
    }
    public function history(Request $request)
    {
        $query = DB::table('bills')
            ->join('statuses', 'bills.status', '=', 'statuses.id')
            ->where('statuses.id', '>', 3)
            ->select('bills.*', 'statuses.status_name');
        // dd($list);
        if ($request->has('order_id') && !empty($request->order_id)) {
            $request->validate([
                'order_id' => 'string',
            ]);
            $query->where('bills.bill_code', 'like', '%' . $request->order_id . '%');
        }

        $list = $query->get();
        return view('admins.checkout.history', compact('list'));
    }
}
