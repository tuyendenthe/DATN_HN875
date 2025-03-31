<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Bill_detail;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChartController extends Controller
{
    //
    public function index(Request $request)
    {
        
        
        if ($request->start) {
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay()->subDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        } else {
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay()->subDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();
        }
       
       
        if ($request->start) {
            $data_start_ = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
        } else {
            $data_start_ = Carbon::today()->startOfDay();
        }
        $data_start_str = $data_start->format('Y-m-d H:i:s');
       
        $data_end_str = $data_end->format('Y-m-d H:i:s');
        if ($data_start_str > $data_end_str) {
            return redirect()->back()->withErrors(['message' => 'Ngày bắt đầu nhỏ hơn ngày kết thúc']);
        }
        
        $orders = Bill::where('status', 4)
        ->whereDate('created_at', '>=', $data_start_str)->whereDate('created_at', '<=', $data_end_str)
        ->get();
        $revenueByDay = [];

        $orders->each(function ($order) use (&$revenueByDay) {
            $date = Carbon::parse($order->created_at)->format('Y-m-d');
            $orderTotal = $order->total;
            if (isset($revenueByDay[$date])) {
                $revenueByDay[$date] += $orderTotal;
            } else {
                $revenueByDay[$date] = $orderTotal;
            }
        });
        $date = [];
        $total = [];
        foreach ($revenueByDay as $key => $value) {
            $date[] = Carbon::parse($key)->format('d-m-Y');
            $total[] = $value;
        }
      
        return view('admins.chart', compact('date', 'total', 'data_start_', 'data_end'));
    }


    public function product_statistics(Request $request)
    {
        if ($request->start) {
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        } else {
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();
        }
   
        if ($request->start) {
            $data_start_ = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
        } else {
            $data_start_ = Carbon::today()->startOfDay();
        }

        $data_start_str = $data_start->format('Y-m-d H:i:s');

        $data_end_str = $data_end->format('Y-m-d H:i:s');
        if ($data_start_str > $data_end_str) {
            return redirect()->back()->withErrors(['message' => 'Ngày bắt đầu nhỏ hơn ngày kết thúc']);
        }
        $orders = Bill::whereBetween('created_at', [$data_start_str, $data_end_str])->where('status', 4)->with('Bill_detail')
            ->get();
        $productDetails = []; 
        foreach ($orders as $order) {
            foreach ($order->Bill_detail as $detail) {
                $productId = $detail->product_id; 
                $quantity = $detail->quantity;   //
                if (isset($productDetails[$productId])) {
            
                    $productDetails[$productId]['quantity'] += $quantity;
                } else {
                    $productDetails[$productId] = [
                        'detail' => $detail,     
                        'quantity' => $quantity 
                    ];
                }
            }
        }
        $product_name = [];
        $product_quantity = [];
        $line_data = [];
        foreach ($productDetails as $productId => $productDetail) {
            $product = Product::find($productDetail['detail']->product_id);
           
          
            $product_name[] = $product->name;
            $line_data[] =  $productDetail['quantity']*$product->price;
            $product_quantity[] = $productDetail['quantity'];
        }
  
        return view('admins.product_statistics',compact('product_name','product_quantity','line_data','data_start_','data_end'));
    }

    public function best_selling(Request $request){
        if ($request->start) {
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        } else {
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();
        }
   
        if ($request->start) {
            $data_start_ = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
        } else {
            $data_start_ = Carbon::today()->startOfDay();
        }

        $data_start_str = $data_start->format('Y-m-d H:i:s');

        $data_end_str = $data_end->format('Y-m-d H:i:s');
        if ($data_start_str > $data_end_str) {
            return redirect()->back()->withErrors(['message' => 'Ngày bắt đầu nhỏ hơn ngày kết thúc']);
        }
        $orderDetails = Bill_detail::where('created_at', '>=', Carbon::now()->subMonth())->get();
        $productQuantities = [];

        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail->product_id;
            $quantity = $orderDetail->quantity;
        
            if (!isset($productQuantities[$productId])) {
                $productQuantities[$productId] = 0;
            }
        
            $productQuantities[$productId] += $quantity;
        }

        $result = [];
        $product_name = [];
        $product_quantity = [];
        foreach ($productQuantities as $productId => $quantity) {
            $result[] = ['product_id' => ProductVariants::with('product')->find($productId), 'quantity' => $quantity];
        }
        usort($result, function($a, $b) {
            return $b['quantity'] - $a['quantity'];
            });
          
        foreach($result as $re){
        
            $product_name[] = $re['product_id']->product->name;
            $product_quantity[] = $re['quantity'];  
        }
        return view('admins.best_selling',compact('product_name','product_quantity','data_start_','data_end'));
       
    }

    public function inventory_product(Request $request){
        $products = Product::with('variants')->get();
        $name_product = [];
        $quantity = [];
        foreach($products as $product){ 
            if($product->variants->count() > 0){
                $a  = 0;
                foreach($product->variants as $variant){
                    $a = $a + $variant->quantity;
                };
                $name_product[] = $product->name;
                $quantity[] = $a;
            }else{
                $name_product[] = $product->name;
                $quantity[] = $product->quantity;
            }
            
        }
        return view('admins.inventory_product',compact('name_product','quantity'));
    }
}
