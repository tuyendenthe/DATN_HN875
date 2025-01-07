<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        $perPage = 20;

        // Lấy sản phẩm với phân trang
        $products = Product::with('category', 'flashSale','variants')->where('is_attributes',2)->latest()->paginate($perPage);

        // Lấy danh sách các danh mục
        $categories = Category::get();

        // Lấy sản phẩm mới nhất (không cần phân trang)
        $newProducts = Product::with('category', 'flashSale','variants')->where('is_attributes',2)->latest()->take(3)->get();

        return view('clients.shop', compact('products', 'categories', 'newProducts'));
    }   public function flashSales()
    {
        $products = FlashSale::with('product')
            ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
            ->orderBy('time_end', 'asc')
            ->get();
//        dd($products);
        $output = '';
        if ($products->isEmpty()) {
            $output .= '<div class="no-products">Phiên sale đã kết thúc, vui lòng quay lại sau.</div>';
        } else {
            foreach ($products as $product) {
                $output .= '
                <div class="col-xxl-3 col-sm-6 col-md-4">
                    <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
                        <div class="epix-product-thumb-3">
                            <div class="epix-action">
                                <a href="/single_product/' . $product->product->id . '" class="p-cart product-popup-toggle">
                                    <i class="fal fa-eye"></i>
                                    <i class="fal fa-eye"></i>
                                </a>
                            </div>
                            <span class="sale">sale</span>
                            <a href="/single_product/' . $product->product->id . '">
                                <img width="223px" height="396px" src="' . asset($product->product->image) . '" alt="">
                            </a>
                        </div>
                        <div class="price-box price-box-3">
                            <span class="price flash-sale-price">'. number_format($product->price_sale, 0, ',', '.') . ' VNĐ</span>
                            <span class="price original-price text-muted"><del>'. number_format($product->price_original, 0, ',', '.') .  'VNĐ</del></span>
                            <a href="/single_product/' . $product->product->id . '">+ Select Option</a>
                        </div>
                        <h5 class="epix-p-title epix-p-title-3">
                            <a href="/single_product/' . $product->product->id . '">' . $product->product->name . '</a>
                        </h5>
                    </div>
                </div>
            ';
            }
        }
        return $output;

    }
    public function shopWithCategories($id)
    {
        $perPage = 20; // Số sản phẩm mỗi trang
        $products = Product::with('category', 'flashSale')->where('is_attributes',2);

        if ($id == 'all') {
            $products = $products->latest()->paginate($perPage);
        } else {
            $products = $products->where('category_id', $id)->latest()->paginate($perPage);
        }

        $categories = Category::get();
        $newProducts = Product::with('category', 'flashSale')->where('is_attributes',2)->latest()->take(5)->get();

        return view('clients.shop', compact('products', 'categories', 'newProducts'));
    }

    public function shopWithRange(Request $request)
    {
        $range = $request->input('price_range');
        $products = Product::query()
            ->join('product_variants', 'products.id', '=', 'product_variants.product_id') // Kết hợp với bảng product_variants
            ->where('is_attributes', 2)
            ->select('products.*', \DB::raw('MIN(product_variants.price) as min_price'), \DB::raw('MAX(product_variants.price) as max_price')) // Lấy giá min và max của sản phẩm
            ->groupBy('products.id'); // Nhóm theo sản phẩm

        // Lọc sản phẩm theo giá
        if ($range === '<3000000') {
            // Lọc sản phẩm có giá dưới 3 triệu
            $products = $products->having('min_price', '<', 3000000);
        } elseif ($range === '3000000-5000000') {
            // Lọc sản phẩm có giá từ 3 triệu đến 5 triệu
            $products = $products->havingBetween('min_price', [3000000, 5000000]);
        } elseif ($range === '5000000-10000000') {
            // Lọc sản phẩm có giá từ 5 triệu đến 10 triệu
            $products = $products->havingBetween('min_price', [5000000, 10000000]);
        } elseif ($range === '10000000-15000000') {
            // Lọc sản phẩm có giá từ 10 triệu đến 15 triệu
            $products = $products->havingBetween('min_price', [10000000, 15000000]);
        } elseif ($range === '15000000-20000000') {
            // Lọc sản phẩm có giá từ 15 triệu đến 20 triệu
            $products = $products->havingBetween('min_price', [15000000, 20000000]);
        } elseif ($range === '20000000-25000000') {
            // Lọc sản phẩm có giá từ 20 triệu đến 25 triệu
            $products = $products->havingBetween('min_price', [20000000, 25000000]);
        } elseif ($range === '25000000-30000000') {
            // Lọc sản phẩm có giá từ 25 triệu đến 30 triệu
            $products = $products->havingBetween('min_price', [25000000, 30000000]);
        } elseif ($range === '30000000-40000000') {
            // Lọc sản phẩm có giá từ 30 triệu đến 35 triệu
            $products = $products->havingBetween('min_price', [30000000, 40000000]);
        } elseif ($range === '40000000-50000000') {
            // Lọc sản phẩm có giá từ 40 triệu đến 50 triệu
            $products = $products->havingBetween('min_price', [40000000, 50000000]);
        } elseif ($range === '>50000000') {
            // Lọc sản phẩm có giá trên 50 triệu
            $products = $products->having('min_price', '>', 50000000);
        } else {
            // Nếu không có lựa chọn nào, lấy tất cả sản phẩm
            $products = Product::query();
        }

        // Lấy tất cả sản phẩm theo điều kiện đã lọc
        $products = $products->get();

        // Tạo output HTML để trả về
        $output = '';
        if ($products->isEmpty()) {
            $output .= '<div class="no-products">Không có sản phẩm nào trong khoảng giá trên.</div>';
        } else {
            foreach ($products as $product) {
                $output .= '
<div class="col-xxl-3 col-sm-6 col-md-4">
    <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
        <div class="epix-product-thumb-3">
            <div class="epix-action">
                <a href="/single_product/' . $product->id . '" class="p-cart product-popup-toggle">
                    <i class="fal fa-eye"></i>
                    <i class="fal fa-eye"></i>
                </a>
            </div>';

if ($product->isOnFlashSale()) {
    $output .= '
                <span class="sale">sale</span>';
}

$output .= '
            <a href="/single_product/' . $product->id . '">
                <img width="151px" height="150px" src="' . asset($product->image) . '" alt="' . $product->name . '">
            </a>
        </div>
        <div class="price-box price-box-3">
            <span class="price">' . number_format($product->variants->min('price'), 0, ',', '.') . ' VNĐ</span>
            <a href="/single_product/' . $product->id . '">+ Select Option</a>
        </div>
        <h5 class="epix-p-title epix-p-title-3">
            <a href="/single_product/' . $product->id . '">' . $product->name . '</a>
        </h5>
    </div>
</div>';

            }
        }

        // Trả về HTML dưới dạng response
        return $output;
    }
    public function shopWithColor(Request $request)
    {
        // Lấy giá trị màu sắc từ yêu cầu AJAX
        $color = $request->input('color');

        // Lọc các sản phẩm có màu sắc tương ứng
        $products = Product::whereHas('variants', function($query) use ($color) {
            $query->where('name', $color); // 'name' là cột màu trong bảng variants
        })->get();

        // Trả về HTML mới cho danh sách sản phẩm
        $output = '';
        foreach ($products as $product) {
            $output .= '
            <div class="col-xxl-3 col-sm-6 col-md-4">
                <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
                    <div class="epix-product-thumb-3">
                        <div class="epix-action">
                            <a href="/single_product/' . $product->id . '" class="p-cart product-popup-toggle">
                                <i class="fal fa-eye"></i>
                                <i class="fal fa-eye"></i>
                            </a>
                        </div>
                        <span class="sale">sale</span>
                        <a href="/single_product/' . $product->id . '"><img width="223px" height="396px" src="' . $product->image . '" alt=""></a>
                    </div>
                    <div class="price-box price-box-3">
                        <span class="price" style="width: 30px;">' . number_format($product->price, 0, ',', '.') . ' VNĐ</span>
                    </div>
                    <h5 class="epix-p-title epix-p-title-3"><a href="/single_product/' . $product->id . '">' . $product->name . '</a></h5>
                </div>
            </div>
        ';
        }


        return $output;
    }

}
