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
use Illuminate\Support\Facades\Mail; // Thêm import Mail
use App\Mail\TestMail; // Import Mailable đã tạo
use Illuminate\Support\Facades\Session;
use App\Models\Notification;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $check = $request->totalSelected;
        $cart = session()->get('cart', []);
        $voucherId = $request -> voucherId;
        // Lấy các sản phẩm đã chọn từ form (dữ liệu JSON được gửi qua trường 'selectedProducts')
        $selectedProducts = json_decode($request->input('selectedProducts'), true);
        $totalProduct = 0;

        $voucher = Voucher::where('id', $voucherId)->first();
        if (!empty($voucher)) {
        if($check <= $voucher->condition ){
            return back()->with('message', 'Đơn hàng không đủ điều kiện áp dụng mã giảm giá.');
        }
    }
        foreach ($selectedProducts as $value) {
            $product_id = $value['product_id']; // Lấy product_id từ mảng
            $check = Product::findOrFail($product_id);
            if ($check->quantity < $value['quantity']) {
                return redirect()->route("cart.view")->with('message', 'Số Lượng Sản Phẩm Bạn Chọn Mua Hiện Chúng Tôi Không Có Đủ, Vui Lòng Quay Lại Sau.');
            }

            }
//         foreach ($selectedProducts as $value) {
//            dd($value);
//             $product_id = $value['product_id']; // Lấy product_id từ mảng
//             $check2 = Product::withTrashed()->find($product_id);
// dd($check2);
//                 // if ($check2 && $check2->trashed()) {

//                 // return redirect()->route("cart.view")->with('message', 'Số Lượng Sản Phẩm Bạn Chọn Mua Hiện Chúng Tôi Không Có Đủ, Vui Lòng Quay Lại Sau.');
//             // }

//             }
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

        $randomNumber = str_pad(mt_rand(0, 99999999999999), 14, '0', STR_PAD_LEFT);

        // Gắn giá trị vào session với key 'noidung'
        Session::put('noidung', $randomNumber);

        // Trả về view checkout với các dữ liệu cần thiết
        return view('clients.checkout', compact('selectedProducts', 'cart', 'discount', 'total', 'totalProduct', 'voucherId'));
    }
    public function store(Request $request)
    {
        $idVoucher = $request['voucherId'];
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = substr(str_shuffle($characters), 0, 10); // Tạo mã đơn hàng ngẫu nhiên
        $user_id = null;
        if(auth()->user()){
            $user_id = auth()->user()->id;
        }
        // dd($request);
        $bill = [
            'bill_code' => $randomString,
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'checkout' => $request['checkout'],
            'note' => $request['note'],
            'address' => $request['address'],
            'user_id' => $user_id,
            'payment_method' => $request['payment_method'],
            'total' => $request['subtotall'],
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

    //    dd($request['products']);
  // Kiểm tra và giải mã JSON nếu cần
                            $products = is_string($request['products'])
                            ? json_decode($request['products'], true) // Chuyển JSON thành mảng
                            : $request['products'];

                            // Kiểm tra nếu dữ liệu không phải là mảng hợp lệ
                            if (!is_array($products)) {
                            return redirect()->route("cart.view")->with('message', 'Dữ liệu sản phẩm không hợp lệ.');
                            }

                            // Lặp qua từng sản phẩm và xử lý
                            foreach ($products as $value) {
                            $product_id = $value['product_id']; // Lấy product_id từ mảng
                            $check = Product::findOrFail($product_id);
                            if ($check->quantity < $value['quantity']) {
                                return redirect()->route("cart.view")->with('message', 'Số Lượng Sản Phẩm Bạn Chọn Mua Hiện Chúng Tôi Không Có Đủ, Vui Lòng Quay Lại Sau.');
                            }

                            }
                            // foreach ($products as $value) {
                            // $product_id = $value['product_id']; // Lấy product_id từ mảng
                            // $check = Product::findOrFail($product_id);
                            // dd($check->deleted_at);
                            // if (is_null($check->deleted_at)) {
                            //     return redirect()->route("cart.view")->with('message', 'Sản Phẩm Bạn Lựa Chọn Hiện Không Còn Bán.');
                            // }

                            // }

        $billRecord = Bill::create($bill);
        $bill_id = $billRecord->id;

        $products = json_decode($request['products'], true);
        // dd($products);


        // Product::update()

        foreach ($products as $item) {
            $cc =Product::findOrFail($item['product_id']);
            $product_id = $item['product_id'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $product_name = $cc['name'];
            $subtotal = $price * $quantity;

            // dd($cc);
            $quantity1 = $cc['quantity']- $quantity;
            DB::table('products')->where('id','=',$cc['id'])->update(['quantity' => $quantity1]);
            $data2 = [
                'bill_id' => $bill_id,
                'product_id' => $product_id,
                'bill_code' => $randomString,
                'quantity' => $quantity,
                'product_name' => $product_name,
                'subtotal' => $subtotal,
                'price' => $price,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            Bill_detail::create($data2);
        }

        if ($idVoucher) {
            $voucher = Voucher::find($idVoucher);

            if ($voucher && $voucher->quantity > 0) {
                $voucher->quantity -= 1;
                $voucher->save();
            } else {
                return redirect()->route("cart.view")->with('message', 'Voucher không hợp lệ hoặc đã hết số lượng.');
            }
        }
        $cart = session()->get('cart', []);

        // Xóa các sản phẩm đã mua khỏi giỏ hàng
        foreach ($products as $purchasedProduct) {
            $product_id = $purchasedProduct['product_id'];
            // Loại bỏ sản phẩm đã mua khỏi giỏ hàng
            $cart = array_filter($cart, function ($item) use ($product_id) {
                return $item['product_id'] != $product_id;
            });
        }

        // Cập nhật lại session giỏ hàng
        session()->put('cart', $cart);
        Mail::to($request['email'])->send(new TestMail($billRecord, $products));


        // Tạo thông báo cho người quản lý
        $notification = Notification::create([
            'message' => 'Bạn có một đơn hàng mới với mã ' . $randomString,
            'is_read' => false,
            'created_at' => now(),
        ]);

        // Cập nhật bill_code sau khi tạo thông báo
        $notification->bill_code = $randomString;
        $notification->save();

        return redirect()->route("checkout.success")->with('success', 'Mua Hàng Thành Công');
    }


    public function orderDetail($bill_code)
{
    $detail = DB::table('bill_details')
        ->join('products', 'bill_details.product_id', '=', 'products.id')
        ->where('bill_details.bill_code', $bill_code)
        ->select('bill_details.*', 'products.name')
        ->get();

    $detail_user = DB::table('bills')->where('bill_code', $bill_code)->first();

    if (!$detail_user) {
        return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
    }

    return view('admins.checkout.detail', compact('detail_user', 'detail'));
}
// public function orderDetail($bill_code)
//     {
//         // Lấy chi tiết đơn hàng
//         $detail = DB::table('bill_details')
//             ->join('products', 'bill_details.product_id', '=', 'products.id')
//             ->where('bill_details.bill_code', $bill_code)
//             ->select('bill_details.*', 'products.name')
//             ->get();

//         // Truy vấn thông tin người dùng từ bảng bills
//         $detail_user = DB::table('bills')->where('bill_code', $bill_code)->first();

//         return view('admins.checkout.detail', compact('detail_user', 'detail'));
//     }

    public function ok(Request $request)
    {
        //  dd($request);


        return view('clients.Order_Success');
    }
    public function bills_client(){
        // dd(auth()->user()->id);
        $data = Bill::join('statuses', 'bills.status', '=', 'statuses.id')
        ->where('user_id', '=', auth()->user()->id)
        ->orderBy('bills.id', 'desc')
        ->select('bills.*', 'statuses.status_name as status_name') // Chỉ lấy cột `name` từ `statuses`
        ->get();
        // dd($data);
        return view('clients.bill_client', compact('data'));
    }
    public function bills_details(String $bill_code){
        // dd($bill_code);
        $data = Bill::join('statuses', 'bills.status', '=', 'statuses.id')
        ->where('user_id', '=', auth()->user()->id)
        ->where('bill_code', '=',$bill_code)
        ->select('bills.*', 'statuses.status_name as status_name') // Chỉ lấy cột `name` từ `statuses`
        ->first();
        // $data2 = Bill_detail::where('bill_code','=',$bill_code)->get();
        $detail = DB::table('bill_details')
        ->join('products', 'bill_details.product_id', '=', 'products.id')
        ->where('bill_details.bill_code', $bill_code) // Sử dụng bill_code để lọc
        ->select('bill_details.*', 'products.name','products.image')
        ->get();
        // dd(vars: $data);
        return view('clients.bill_details',compact('detail','data'));
    }
    public function list(Request $request)
{
    // Start the query
    $query = DB::table('bills')
        ->join('statuses', 'bills.status', '=', 'statuses.id')
        ->where('statuses.id', '<=', 3)
        ->select('bills.*', 'statuses.status_name')->latest();

    // Check for search input
    if ($request->has('order_id') && !empty($request->order_id)) {
        $request->validate([
            'order_id' => 'string|max:255', // Validate the order_id
        ]);
        // Search for the order_id
        $query->where('bills.bill_code', 'like', '%' . $request->order_id . '%');
    }

    // Paginate results
    $listCheckouts = $query->paginate(10); // Change the number of items per page if needed

    return view('admins.checkout.list', compact('listCheckouts'));
}

    // public function detail($bill_code)
    // {
    //     // $detail = DB::table('bill_details')
    //     //     ->join('products', 'bill_details.product_id', '=', 'products.id')

    //     //     ->select('bill_details.*', 'products.name')
    //     //     ->get();

    //     // $detail = DB::table('bill_details')->where('bill_code', '=', $bill_code)->get();

    //     // Truy vấn thông tin người dùng từ bảng bills
    //     // $detail_user = DB::table('bills')->where('bill_code', '=', $bill_code)->first();
    //     // dd($detail);
    //     // dd($detail_user);
    //     // dd($bill_code);
    //     $data = Bill::join('statuses', 'bills.status', '=', 'statuses.id')
    //     // ->where('user_id', '=', auth()->user()->id)
    //     ->where('bill_code', '=',$bill_code)
    //     ->select('bills.*', 'statuses.status_name as status_name') // Chỉ lấy cột `name` từ `statuses`
    //     ->first();
    //     // dd($data);
    //     // $data2 = Bill_detail::where('bill_code','=',$bill_code)->get();
    //     $detail = DB::table('bill_details')
    //     ->join('products', 'bill_details.product_id', '=', 'products.id')
    //     ->where('bill_details.bill_code', $bill_code) // Sử dụng bill_code để lọc
    //     ->select('bill_details.*', 'products.name','products.image')
    //     ->get();
    //     // dd(vars: $data);
    //     return view('admins.checkout.detail', compact('data', 'detail'));
    // }

    public function detail($bill_code)
{
    $data = Bill::join('statuses', 'bills.status', '=', 'statuses.id')
        ->where('bills.bill_code', '=', $bill_code)
        ->select('bills.*', 'statuses.status_name as status_name')
        ->first();

    if (!$data) {
        return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
    }

    $detail = DB::table('bill_details')
        ->join('products', 'bill_details.product_id', '=', 'products.id')
        ->where('bill_details.bill_code', $bill_code)
        ->select('bill_details.*', 'products.name', 'products.image')
        ->get();

    return view('admins.checkout.detail', compact('data', 'detail'));
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
            ->where('bills.status', '>', 3)
            ->select('bills.*', 'statuses.status_name');

        // Kiểm tra nếu có tìm kiếm theo mã đơn hàng
        if ($request->has('order_id') && !empty($request->order_id)) {
            $request->validate([
                'order_id' => 'string',
            ]);
            $query->where('bills.bill_code', 'like', '%' . $request->order_id . '%');
        }

        // Sử dụng paginate thay vì get
        $list = $query->paginate(10); // Thay đổi số lượng đơn hàng trên mỗi trang nếu cần

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
        $stt= $request->status_id;
         Bill::where('id', $id)->update(['status' => $request->status_id]);
         $data = Bill::findOrFail($id);
         $bill_code = $data['bill_code'];
        if($request->$stt = 5){
            $data2 = Bill_detail::where('bill_code','=',$bill_code)->get();

            foreach($data2 as $value){
                $product = ProductVariants::findOrFail($value->product_id);

                $quantyti = $product->quantity + $value->quantity;
                 DB::table('product_variants')->where('id','=',$value->product_id)->update(['quantity'=> $quantyti]);
            };

        }
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


    private function syncBank($apikey,$sotaikhoan){
		$curl = curl_init();
	    $data = array(
	    	'bank_acc_id' => $sotaikhoan,
	    );
	    $postdata = json_encode($data);

	    curl_setopt_array($curl, array(
	        CURLOPT_URL => "https://oauth.casso.vn/v2/sync",
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "POST",
	        CURLOPT_POSTFIELDS => $postdata,
	        CURLOPT_HTTPHEADER => array(
	            "Authorization: Apikey ".$apikey,
	            "Content-Type: application/json"
	        ),
	    ));

	    $response = curl_exec($curl);
	    $err = curl_error($curl);

	    curl_close($curl);
	}

	private function historyBank($apikey){
		$curl = curl_init();

	    curl_setopt_array($curl, array(
	      CURLOPT_URL => "https://oauth.casso.vn/v2/transactions?fromDate=2024-04-01&page=1&pageSize=20&sort=DESC",
	      CURLOPT_RETURNTRANSFER => true,
	      CURLOPT_TIMEOUT => 30,
	      CURLOPT_CUSTOMREQUEST => "GET",
	      CURLOPT_HTTPHEADER => array(
	        "Authorization: Apikey ".$apikey,
	        "Content-Type: application/json"
	      ),
	    ));

	    $response = curl_exec($curl);
	    $err = curl_error($curl);

	    $response = json_decode($response, true);

	    curl_close($curl);

	    return $response['data']['records'];
	}
    public function cancel(String $bill_code){

        // $data = Bill::where('bill_code','=',$bill_code)->get();
        $check =DB::table('bills')->where('bill_code','=',$bill_code)->first();
        if($check->status >=2){
            return back()->with('message', 'Không Thể Hủy Do Đơn Hàng Đã Cập Nhật Trạng Thái Trước Đó');
        }
        DB::table('bills')->where('bill_code','=',$bill_code)->update(['status'=> 5]);
        $data = Bill_detail::where('bill_code','=',$bill_code)->get();
        // dd($data);
        foreach($data as $value){
            $product = Product::findOrFail($value->product_id);

            $quantyti = $product->quantity + $value->quantity;
             DB::table('products')->where('id','=',$value->product_id)->update(['quantity'=> $quantyti]);
        };
        return back()->with('message1', 'Đã Hủy Đơn Hàng');
    }

    public function checkPay(Request $request)
	{
        $sotaikhoan = "0362978755";
        $apikey = "AK_CS.bf6ed390bd4111ef9cf3ed0b3d7702f1.fRsxcBmDNRzpzSs65eatAEnLm0brm5UpflFhPVqL9QH0KwRO2NTGMkZdnDyN0ZTv7VJbrqtP";

        $noidung = Session::get('noidung');
        $tongtiengiohang = $request['tongtiengiohang'];

        $thanhtoan = 0;
        $this->syncBank($apikey,$sotaikhoan);
        foreach ($this->historyBank($apikey) as $item) {
            if (strpos($item['description'], $noidung) !== false){
                if($item['amount'] < $tongtiengiohang){
                    echo "Số tiền chuyển nhỏ hơn giá trị thanh toán!";
                    return;
                }else{
                    $idVoucher = $request['voucherId'];
                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    $randomString = substr(str_shuffle($characters), 0, 10);
                    $user_id = null;
                    if(auth()->user()){
                        $user_id = auth()->user()->id;
                    }

                    $bill = [
                        'bill_code' => $randomString,
                        'name' => $request['name'],
                        'phone' => $request['phone'],
                        'email' => $request['email'],
                        'checkout' => $request['checkout'],
                        'note' => $request['note'],
                        'address' => $request['address'],
                        'user_id' => $user_id,
                        'payment_method' => 'online',
                        'total' => $request['tongtiengiohang'],
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    // dd($bill);
                    $billRecord = Bill::create($bill);
                    $bill_id = $billRecord->id;

                    $products = json_decode($request['products'], true);
                    // dd($products);


                    // Product::update()

                    foreach ($products as $item) {
                        $cc =Product::findOrFail($item['product_id']);
                        $product_id = $item['product_id'];
                        $price = $item['price'];
                        $quantity = $item['quantity'];
                        $product_name = $cc['name'];
                        $subtotal = $price * $quantity;

                        // dd($cc);
                        $quantity1 = $cc['quantity']- $quantity;
                        DB::table('products')->where('id','=',$cc['id'])->update(['quantity' => $quantity1]);
                        $data2 = [
                            'bill_id' => $bill_id,
                            'product_id' => $product_id,
                            'bill_code' => $randomString,
                            'quantity' => $quantity,
                            'product_name' => $product_name,
                            'subtotal' => $subtotal,
                            'price' => $price,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        Bill_detail::create($data2);
                    }
                    if ($idVoucher) {
                        $voucher = Voucher::find($idVoucher);

                        if ($voucher && $voucher->quantity > 0) {
                            $voucher->quantity -= 1;
                            $voucher->save();
                        } else {
                            return back()->with('error', 'Voucher không hợp lệ hoặc đã hết số lượng.');
                        }
                    }
                    $cart = session()->get('cart', []);

                    // Xóa các sản phẩm đã mua khỏi giỏ hàng
                    foreach ($products as $purchasedProduct) {
                        $product_id = $purchasedProduct['product_id'];
                        // Loại bỏ sản phẩm đã mua khỏi giỏ hàng
                        $cart = array_filter($cart, function ($item) use ($product_id) {
                            return $item['product_id'] != $product_id;
                        });
                    }

                    // Cập nhật lại session giỏ hàng
                    session()->put('cart', $cart);
                    Mail::to($request['email'])->send(new TestMail($billRecord, $products));

                    $thanhtoan = 1;
                }
                break;
            }
        }

        if($thanhtoan == 1){
            Session::forget('noidung');
            Session::forget('tongtiengiohang');
            echo 11;
            return;
        }else{
            echo "Hệ thống chưa nhận được tiền, vui lòng gặp nhân viên để được hỗ trợ!";
            return;
        }
	}
}
