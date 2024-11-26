<?php

namespace App\Http\Controllers;

use App\Models\Bill;
// use App\Models\status;
use App\Models\Bill_detail;
use App\Models\Status;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $voucherId = $request -> voucherId;
        // Lấy các sản phẩm đã chọn từ form (dữ liệu JSON được gửi qua trường 'selectedProducts')
        $selectedProducts = json_decode($request->input('selectedProducts'), true);
        $totalProduct = 0;
        foreach ($selectedProducts as $item) {
            $totalProduct += $item['price'];
        }
        // Lấy thông tin giảm giá và tổng tiền từ form
        $discount = $request->input('finalDiscount', 0); // Nếu không có giảm giá thì mặc định là 0
        $total = $request->input('finalTotal', 0); // Tổng tiền sau khi giảm giá

        // Kiểm tra nếu có sản phẩm được chọn, hoặc thông tin giảm giá và tổng tiền


        // Xử lý thanh toán và các bước tiếp theo (ví dụ: lưu thông tin đơn hàng, gửi email, v.v.)
        // Ví dụ:
        // $order = Order::create([
        //     'user_id' => auth()->id(),
        //     'total' => $total,
        //     'discount' => $discount,
        //     'products' => $selectedProducts,
        //     // các thông tin khác như địa chỉ, phương thức thanh toán, v.v.
        // ]);

        // Trả về view checkout với các dữ liệu cần thiết
        return view('clients.checkout', compact('selectedProducts', 'cart', 'discount', 'total', 'totalProduct', 'voucherId'));
    }
    public function store(Request $request)
    {
        $idVoucher = $request->voucherId;
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
        $billRecord = Bill::create($bill);
        $bill_id = $billRecord->id; // Lấy bill_id từ bản ghi vừa tạo

        $products = json_decode($request->input('products'), true);


        foreach ($products as $item ) {
            // Lấy thông tin sản phẩm từ cart
            $product_id = $item['product_id'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $subtotal = $price * $quantity;
            $data2 = [
                'bill_id' =>$bill_id,
                'product_id' => $product_id,
                'bill_code' => $randomString,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'price' => $price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            // Thực hiện insert vào cơ sở dữ liệu
            Bill_detail::create($data2);
        }

        if ($idVoucher) {
            // Lấy voucher từ cơ sở dữ liệu
            $voucher = Voucher::find($idVoucher);

            // Kiểm tra xem voucher có tồn tại và còn số lượng không
            if ($voucher && $voucher->quantity > 0) {
                $voucher->quantity -= 1;
                $voucher->save(); // Cập nhật vào cơ sở dữ liệu
            } else {
                return back()->with('error', 'Voucher không hợp lệ hoặc đã hết số lượng.');
            }
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
    public function status( $id){
        // dd($id);
           $data = Bill::find($id);
        //    dd($data);

        $statuses = Status::where('id', '>=', $data->status)->get();

        return view('admins.checkout.status', compact('data', 'statuses'));
    }
    public function updateStatus(Request $request, $id){
        // dd($id);
        Bill::where('id', $id)->update(['status' => $request->status_id]);

        return redirect()->route("checkout.list")->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }


}
