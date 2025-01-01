<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VnPayController extends Controller
{
    public function createPayment(Request $request){
        // Lấy thông tin config:
        $vnp_TmnCode = config('vnpay.vnp_TmnCode'); // Mã website của bạn tại VNPAY
        $vnp_HashSecret = config('vnpay.vnp_HashSecret'); // Chuỗi bí mật
        $vnp_Url = config('vnpay.vnp_Url'); // URL thanh toán của VNPAY
        $vnp_ReturnUrl = config('vnpay.vnp_Returnurl'); // URL nhận kết quả trả về
        session()->put('bills', $request->all());

        // Lấy thông tin từ đơn hàng phục vụ thanh toán
        // Dưới đây là thông tin giả định, bạn có thể lấy thông tin đơn hàng của bạn  để thay thế
        $order = (object)[
            "code" => 'ORDER' . rand(100000, 999999),  // Mã đơn hàng
            "total" => $request['subtotall'], // Số tiền cần thanh toán (VND)
            "bankCode" => 'NCB',   // Mã ngân hàng
            "type" => "billpayment", // Loại đơn hàng
             "info" => "Thanh toán đơn hàng" // Thông tin đơn hàng
          ];

            // Thông tin đơn hàng, thanh toán
           $vnp_TxnRef = $order->code;
           $vnp_OrderInfo = $order->info;
           $vnp_OrderType =  $order->type;
           $vnp_Amount = $order->total * 100;
           $vnp_Locale = 'vn';
           $vnp_BankCode = $order->bankCode;  // Mã ngân hàng
           $vnp_IpAddr = $request->ip(); // Địa chỉ IP

           // Tạo input data để gửi sang VNPay server
           $inputData = array(
               "vnp_Version" => "2.1.0",
               "vnp_TmnCode" => $vnp_TmnCode,
               "vnp_Amount" => $vnp_Amount,
               "vnp_Command" => "pay",
               "vnp_CreateDate" => date('YmdHis'),
               "vnp_CurrCode" => "VND",
               "vnp_IpAddr" => $vnp_IpAddr,
               "vnp_Locale" => $vnp_Locale,
               "vnp_OrderInfo" => $vnp_OrderInfo,
               "vnp_OrderType" => $vnp_OrderType,
               "vnp_ReturnUrl" => $vnp_ReturnUrl,
               "vnp_TxnRef" => $vnp_TxnRef,
           );
            // Kiểm tra nếu mã ngân hàng đã được thiết lập và không rỗng
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            // Kiểm tra nếu thông tin tỉnh/thành phố hóa đơn đã được thiết lập và không rỗng
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State; // Gán thông tin tỉnh/thành phố hóa đơn vào mảng dữ liệu input
            }

            // Sắp xếp mảng dữ liệu input theo thứ tự bảng chữ cái của key
            ksort($inputData);

            $query = ""; // Biến lưu trữ chuỗi truy vấn (query string)
            $i = 0; // Biến đếm để kiểm tra lần đầu tiên
            $hashdata = ""; // Biến lưu trữ dữ liệu để tạo mã băm (hash data)

            // Duyệt qua từng phần tử trong mảng dữ liệu input
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    // Nếu không phải lần đầu tiên, thêm ký tự '&' trước mỗi cặp key=value
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    // Nếu là lần đầu tiên, không thêm ký tự '&'
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1; // Đánh dấu đã qua lần đầu tiên
                }
                // Xây dựng chuỗi truy vấn
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            // Gán chuỗi truy vấn vào URL của VNPay
            $vnp_Url = $vnp_Url . "?" . $query;

            // Kiểm tra nếu chuỗi bí mật hash secret đã được thiết lập
            if (isset($vnp_HashSecret)) {
                // Tạo mã băm bảo mật (Secure Hash) bằng cách sử dụng thuật toán SHA-512 với hash secret
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                // Thêm mã băm bảo mật vào URL để đảm bảo tính toàn vẹn của dữ liệu
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

             return redirect($vnp_Url);
       }
    public function vnpayReturn(Request $request)
    {
//        dd(session()->get('bills'));
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = $request->all();

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, config('vnpay.vnp_HashSecret'));

        if ($secureHash === $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                // Thanh toán thành công
                $billData = session()->get('bills');

                // Chuyển đổi mảng dữ liệu thành đối tượng Request
                $fakeRequest = new Request($billData);
                return app(CheckoutController::class)->processBill($fakeRequest);
//                return view('clients.vnpay.payment_success', compact('inputData'));
            } else {
                // Thanh toán không thành công
                return view('clients.vnpay.payment_failed');
            }
        } else {
            // Dữ liệu không hợp lệ
            return view('clients.vnpay.payment_failed');
        }
    }
}
