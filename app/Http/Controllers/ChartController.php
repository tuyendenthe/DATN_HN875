<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Bill;
class ChartController extends Controller
{
    //
    public function index(Request $request){
        if ($request->start) {
            $data_start = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay()->subDay();
            $data_end = Carbon::createFromFormat('Y-m-d', $request->end)->endOfDay();
        } else {
            $data_start = Carbon::today('Asia/Ho_Chi_Minh')->startOfDay()->subDay();
            $data_end = Carbon::today('Asia/Ho_Chi_Minh')->endOfDay();
        }
        if($request->start){
            $data_start_ = Carbon::createFromFormat('Y-m-d', $request->start)->startOfDay();
        }else{
            $data_start_ = Carbon::today()->startOfDay();
        }
        $data_start_str = $data_start->format('Y-m-d H:i:s');
        $data_end_str = $data_end->format('Y-m-d H:i:s');
        $orders = Bill::whereBetween('created_at', [$data_start_str, $data_end_str])
        ->where('status', 4)
     
        ->get();
        $revenueByDay = [];

        $orders->each(function($order) use (&$revenueByDay) {
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
}
