<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\FlashSale;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        // dd($cart);
        // Lấy tối đa 10 sản phẩm từ bảng products
        $products = (Product::with('category','flashSale'))->where('is_attributes',2)->latest()->take(8)->get();
        $categories = Category::all();
        $flashSales = FlashSale::with('product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->limit(4)
            ->get();
//        dd($flashSales);
        $banners = Slide::all();

        // Trả về view và truyền danh sách sản phẩm
        return view('clients.index', compact('products', 'flashSales', 'banners','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */

    //  Chi tiết sản phẩm

    public function show(string $id)
    {


        $products = (Product::with('category','flashSale'))->findOrFail($id);
        // $categories = Category::all();
        $flashSales = FlashSale::with('product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->limit(4)
            ->get();
        $category_id = $products['category_id'];

        $excludedId = $products['$id'];
        $limit = 4;
        

        $category =  Product::where('product_parent',$id)->get();
        $reviews = Comment::with('user') 
        ->where('product_id', $id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $ratingCounts = $reviews->groupBy('star')->map(function ($group) {
            return $group->count();
        });
        $totalReviews = $reviews->where('status', 1)->count(); // Tổng số đánh giá có status = 1
        $averageRating = $totalReviews > 0
            ? $reviews->where('status', 1)->avg('star') // Trung bình số sao của các review có status = 1
            : 0;
        return view('clients.single_product', compact(['products','flashSales','reviews', 'category','ratingCounts', 'totalReviews', 'averageRating']));

//         $reviews = Comment::where('product_id', $id)->where('status', 1)
//         ->orderBy('created_at', 'desc')
//         ->get();
//         return view('clients.single_product', compact(['products','reviews','categories']));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%$keyword%")
            ->take(10)
            ->get();

        $output = '';
        if ($products->count() > 0) {
            foreach ($products as $product) {
                $output .= '
                    <a href="/single_product/' . $product->id . '" class="result-item" style="display: flex;
                                                    align-items: center;
                                                    padding: 10px;
                                                    cursor: pointer;
                                                    border-bottom: 1px solid #f0f0f0;
                                                    text-decoration: none">
                        <img style="margin-right: 10px;border-radius: 5px;" width="40px" height="40px" src="' . asset($product->image) . '" alt="' . $product->name . '" />
                        <div class="product-info" style="display: flex;flex-direction: column;">
                            <span class="product-name">' . $product->name . '</span>
                            <span class="product-price">' . number_format($product->price, 0, ',', '.') . ' đ</span>
                        </div>
                    </a>
                ';
            }
        } else {
            $output .= '<div class="result-item">No products found</div>';
        }

        return $output;
    }
}
