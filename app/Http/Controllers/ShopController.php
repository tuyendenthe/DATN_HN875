<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $perPage = 6;
        $products = (Product::with('category','flashSale'))->latest()->take(8)->paginate($perPage);
        $categories = Category::get();
        $newProducts = (Product::with('category','flashSale'))->latest()->take(5)->get();
        return view('clients.shop', compact('products', 'categories', 'newProducts'));
    }

    public function flashSales()
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
    // public function shopWithCategories(Request $request)
    // {
    //     $id = $request->input('id');
    //     if ($id == 'all') {
    //         $products = Product::all();
    //     }else{
    //         $products = Product::where('category_id', $id)->get();

    //     }
    //     $output = '';
    //     if ($products->isEmpty()) {
    //         $output .= '<div class="no-products">No products found for this price range.</div>';
    //     } else {
    //         foreach ($products as $product) {
    //             $output .= '
    //             <div class="col-xxl-3 col-sm-6 col-md-4">
    //                 <div class="epix-single-product-3 mb-40 style-2 text-center swiper-slide">
    //                     <div class="epix-product-thumb-3">
    //                         <div class="epix-action">
    //                             <a href="/single_product/' . $product->id . '" class="p-cart product-popup-toggle">
    //                                 <i class="fal fa-eye"></i>
    //                                 <i class="fal fa-eye"></i>
    //                             </a>
    //                         </div>
    //                         <span class="sale">sale</span>
    //                         <a href="/single_product/' . $product->id . '">
    //                             <img width="223px" height="396px" src="' . asset($product->image) . '" alt="' . $product->name . '">
    //                         </a>
    //                     </div>
    //                     <div class="price-box price-box-3">
    //                         <span class="price flash-sale-price">'. number_format($product->price, 0, ',', '.') . ' VNĐ</span>
    //                         <a href="/single_product/' . $product->id . '">+ Select Option</a>
    //                     </div>
    //                     <h5 class="epix-p-title epix-p-title-3">
    //                         <a href="/single_product/' . $product->id . '">' . $product->name . '</a>
    //                     </h5>
    //                 </div>
    //             </div>
    //         ';
    //         }
    //     }
    //     return $output;
    // }

    public function shopWithCategories($id)
{
    $perPage = 6; // Số sản phẩm mỗi trang
    $products = Product::with('category', 'flashSale');

    if ($id == 'all') {
        $products = $products->latest()->paginate($perPage);
    } else {
        $products = $products->where('category_id', $id)->latest()->paginate($perPage);
    }

    $categories = Category::get();
    $newProducts = Product::with('category', 'flashSale')->latest()->take(5)->get();

    return view('clients.shop', compact('products', 'categories', 'newProducts'));
}
    public function shopWithRange(Request $request)
    {
        $range = $request->input('price_range');
        $products = Product::query();

        // Lọc sản phẩm theo giá
        if ($range === '<3000000') {
            $products = $products->where('price', '<', 3000000);
        } elseif ($range === '3000000-5000000') {
            $products = $products->whereBetween('price', [3000000, 4000000]);
        } elseif ($range === '>5000000') {
            $products = $products->where('price', '>', 4000000);
        }else{
            $products = Product::query();
        }

        // Lấy tất cả sản phẩm theo điều kiện đã lọc
        $products = $products->get();

        // Tạo output HTML để trả về
        $output = '';
        if ($products->isEmpty()) {
            $output .= '<div class="no-products">No products found for this price range.</div>';
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
                            </div>
                            <span class="sale">sale</span>
                            <a href="/single_product/' . $product->id . '">
                                <img width="223px" height="396px" src="' . asset($product->image) . '" alt="' . $product->name . '">
                            </a>
                        </div>
                        <div class="price-box price-box-3">
                            <span class="price">' . number_format($product->price, 0, ',', '.') . ' VNĐ</span>
                            <a href="/single_product/' . $product->id . '">+ Select Option</a>
                        </div>
                        <h5 class="epix-p-title epix-p-title-3">
                            <a href="/single_product/' . $product->id . '">' . $product->name . '</a>
                        </h5>
                    </div>
                </div>
            ';
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
