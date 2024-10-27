<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Bill_detail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $cart = session()->get('cart', []);
        // dd($cart);

        return view('clients.checkout', compact('request','cart'));
    }
    public function store(Request $request)
    {
        // dd($request);
//         $randomString = str::upper(Str::random(5)) . Str::lower(Str::random(3)) . rand(10, 99); // Example combining letters and numbers
// $shuffledString = Str::shuffle($randomString);
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$randomString = substr(str_shuffle($characters), 0, 10);
        $bill=[
            'bill_code' => $randomString,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,

            'checkout' => $request->checkout,
            'note' => $request->note,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'status' => 1,
            'created_at' =>now(),
            'updated_at' =>now(),
        ];
        Bill::create($bill);
        $product_ids  = is_array($request->id_product) ? $request->id_product : [$request->id_product];
       foreach($product_ids as $item => $id_product){
        Bill_detail::create([
            'product_id'=> $id_product,
            'bill_code' => $randomString,
            'quantity'=> $request->quantity[$item],
            'subtotal'=> $request->subtotal[$item],
            'created_at' =>now(),
            'updated_at' =>now(),
        ]);
       }


       return redirect()->route("checkout.success")->with('success', 'Mua Hàng Thành Công');


    }
    public function ok(Request $request)
    {   dd($request);


        return view('clients.Order_Success');
    }

}
