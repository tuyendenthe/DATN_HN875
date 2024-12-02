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
    // public function store(Request $request)
    // {
    //     $idVoucher = $request->voucherId;
    //     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    //     $randomString = substr(str_shuffle($characters), 0, 10);
    //     $bill = [
    //         'bill_code' => $randomString,
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,

    //         'checkout' => $request->checkout,
    //         'note' => $request->note,
    //         'payment_method' => $request->payment_method,
    //         'total' => $request->total,
    //         'status' => 1,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ];
    //     $billRecord = Bill::create($bill);
    //     $bill_id = $billRecord->id; // Lấy bill_id từ bản ghi vừa tạo

    //     $products = json_decode($request->input('products'), true);


    //     foreach ($products as $item ) {
    //         // Lấy thông tin sản phẩm từ cart
    //         $product_id = $item['product_id'];
    //         $price = $item['price'];
    //         $quantity = $item['quantity'];
    //         $subtotal = $price * $quantity;
    //         $data2 = [
    //             'bill_id' =>$bill_id,
    //             'product_id' => $product_id,
    //             'bill_code' => $randomString,
    //             'quantity' => $quantity,
    //             'subtotal' => $subtotal,
    //             'price' => $price,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ];
    //         // Thực hiện insert vào cơ sở dữ liệu
    //         Bill_detail::create($data2);
    //     }

    //     if ($idVoucher) {
    //         // Lấy voucher từ cơ sở dữ liệu
    //         $voucher = Voucher::find($idVoucher);

    //         // Kiểm tra xem voucher có tồn tại và còn số lượng không
    //         if ($voucher && $voucher->quantity > 0) {
    //             $voucher->quantity -= 1;
    //             $voucher->save(); // Cập nhật vào cơ sở dữ liệu
    //         } else {
    //             return back()->with('error', 'Voucher không hợp lệ hoặc đã hết số lượng.');
    //         }
    //     }


    //     return redirect()->route("checkout.success")->with('success', 'Mua Hàng Thành Công');
    // }
    public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15', // Kiểm tra độ dài số điện thoại
        'email' => 'required|email|max:255',
        'checkout' => 'required|string|max:255',
        'payment_method' => 'required|string|max:50',
        'total' => 'required|integer|min:0',
        'products' => 'required|json', // Dữ liệu sản phẩm phải là JSON
        'voucherId' => 'nullable|integer|exists:vouchers,id' // Nếu có voucher
    ]);

    // Lấy thông tin voucher (nếu có)
    $idVoucher = $request->voucherId;

    // Tạo mã hóa đơn ngẫu nhiên
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = substr(str_shuffle($characters), 0, 10);

    // Tạo mảng dữ liệu hóa đơn
    $bill = [
        'bill_code' => $randomString,
        'user_id' => auth()->id(), // Lưu ID người dùng đã đăng nhập
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'checkout' => $request->checkout,
        'note' => $request->note ?? '', // Nếu không có ghi chú thì để trống
        'payment_method' => $request->payment_method,
        'total' => $request->total,
        'status' => 1, // Trạng thái ban đầu
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // Lưu hóa đơn vào cơ sở dữ liệu
    $billRecord = Bill::create($bill);
    $bill_id = $billRecord->id; // Lấy ID của hóa đơn vừa tạo

    // Giải mã dữ liệu sản phẩm từ JSON
    $products = json_decode($request->input('products'), true);

    // Lưu từng sản phẩm vào bảng bill_details
    foreach ($products as $item) {
        // Lấy thông tin sản phẩm từ cart
        $product_id = $item['product_id'];
        $price = $item['price'];
        $quantity = $item['quantity'];
        $subtotal = $price * $quantity;

        // Tạo mảng dữ liệu cho bảng bill_details
        $data2 = [
            'bill_id' => $bill_id,
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

    // Xử lý voucher (nếu có)
    if ($idVoucher) {
        // Lấy voucher từ cơ sở dữ liệu
        $voucher = Voucher::find($idVoucher);

        // Kiểm tra xem voucher có tồn tại và còn số lượng không
        if ($voucher && $voucher->quantity > 0) {
            $voucher->quantity -= 1; // Giảm số lượng voucher
            $voucher->save(); // Cập nhật vào cơ sở dữ liệu
        } else {
            return back()->with('error', 'Voucher không hợp lệ hoặc đã hết số lượng.');
        }
    }

    // Redirect đến trang thành công
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
    public function check_order(){
        $order = null;


        return view('clients.search_order', compact('order'));
    }
    public function search_order(request $request){
        // dd($request);
        $order = Bill::where('bill_code', $request->bill_code)->first();
    //  dd($order->status);
        $status = Status::where('id', $order->status)->first();


return view('clients.search_order', compact('order', 'status'));
    }
    public function myOrders()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem đơn hàng.');
        }

        // Lấy ID người dùng đã đăng nhập
        $userId = auth()->id();

        // Lấy danh sách đơn hàng của người dùng
        $orders = Bill::where('user_id', $userId)->get(); // Giả sử bạn đã lưu user_id khi tạo hóa đơn

        return view('clients.my_orders', compact('orders'));
    }

}
