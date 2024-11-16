<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $req)
    {
        $products = Product::where('name', 'like', '%' . $req->keyw . '%')->get();

        return view('clients.shop', compact('products'));
    }

    public function searchProduct(Request $req)
    {
        $listProducts = Product::where('name', 'like', '%' . $req->keyw . '%')->get();

        return view('admins.tables', compact('listProducts'));
    }

    public function searchCheckout(Request $req)
    {
        // Khởi tạo truy vấn
        $query = Bill::query();

        // Kiểm tra nếu có tham số tìm kiếm
        if ($req->has('order_id') && !empty($req->order_id)) {
            $req->validate([
                'order_id' => 'string',
            ]);
            $listCheckouts = $query->where('bill_code', 'like', '%' . $req->order_id . '%')->get();
            
        } else {
            // Nếu không có tham số tìm kiếm, lấy tất cả đơn hàng
            $listCheckouts = $query->get();
        }

        // Trả về view với biến $listCheckouts
        return view('admins.checkout.list', compact('listCheckouts'));
        
    }
    
    
}
