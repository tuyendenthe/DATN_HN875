<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookFixController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenController;

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


use App\Http\Controllers\CartController;
use Illuminate\Routing\Router;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\FlashSaleController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/shop', function () {
    return view('clients.shop');
})->name('shop');


// Route::get('/', function () {
//     return view('clients.index');
// })->name('index');

// Route::get('/shop', function () {S
//     return view('clients.shop');
// });


// Route::get('/', [HomeUserController::class, 'index']);
// Route::get('/index', [HomeUserController::class, 'index']);
Route::get('/index/{id}', [HomeUserController::class, 'show']);
Route::get('/', [HomeUserController::class, 'index'])->name('index');
Route::get('/index/{id}', [HomeUserController::class, 'show'])->name('product.details');

Route::get('/contact', function () {
    return view('clients.contact');
})->name('contact.form');

Route::post('/contact', [ContactController::class, 'sendContact'])->name('contact.send');

Route::get('/book-fix', function () {
    return view('clients.bookfix');
})->name('bookfix.form');

Route::post('/book-fix', [BookFixController::class, 'sendBookFix'])->name('bookfix.send');



Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/search-product', [SearchController::class, 'searchProduct'])->name('search.product');

// Route::get('contact', function () {
//     return view('clients.contact');
// });




Route::get('checkout', function () {
    return view('clients.checkout');
});


Route::get('/blog', function () {
    return view('clients.blog');
})->name('blog');


Route::get('/about', function () {
    return view('clients.about');
})->name('about');

Route::get('/single_product', function () {
    return view('clients.single_product');
})->name('single_product');

Route::get('/single_blog', function () {
    return view('clients.single_blog');
})->name('single_blog');

Route::get('login',[AuthenController::class,'login'])->name('login');
Route::post('login',[AuthenController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthenController::class,'logout'])->name('logout');
Route::get('register',[AuthenController::class,'register'])->name('register');
Route::post('register',[AuthenController::class,'postRegister'])->name('postRegister');

Route::group(['prefix' => 'admin1', 'middleware' => 'checkAdmin'],function() {
    Route::get('/dashboard', function () {
        return view('admins.dashboard');
    })->name('dashboard');


    Route::get('/chart', function () {
        return view('admins.chart');
    })->name('chart');


    Route::get('/widgets', function () {
        return view('admins.widgets');
    })->name('widgets');

    Route::get('/tables', function () {
        return view('admins.tables');
    })->name('tables');

    Route::get('/fullwidth', function () {
        return view('admins.fullwidth');
    })->name('fullwidth');

    Route::get('/form-basic', function () {
        return view('admins.form-basic');
    })->name('form-basic');

    Route::get('/form-wizard', function () {
        return view('admins.form-wizard');
    })->name('form-wizard');
});

Route::resource('admin1/category', CategoryController::class);
Route::resource('admin1/category_post', CategoryPostController::class);
Route::resource('admin1/banner', BannerController::class);
Route::resource('admin1/contact', ContactController::class);
Route::patch('/contact/{contact}/success', [ContactController::class, 'updateSuccess'])->name('contact.success');
Route::patch('/contact/{contact}/failed', [ContactController::class, 'updateFailed'])->name('contact.failed');

Route::resource('admin1/bookfix', BookFixController::class);
Route::patch('/bookfix/{bookfix}/success', [BookFixController::class, 'updateSuccess'])->name('bookfix.success');
Route::patch('/bookfix/{bookfix}/failed', [BookFixController::class, 'updateFailed'])->name('bookfix.failed');





Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
    Route::get('update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::put('update-product/{id}', [ProductController::class, 'updatePutProduct'])->name('updatePutProduct');
    Route::delete('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});

/* -------------------------------- BIẾN THỂ -------------------------------- */
Route::prefix('/variants')->name('variants.')->group(function () {
    Route::get('/{product_id}', [VariantController::class, 'listVariant'])->name('listVariant');
    Route::get('add-variant/{product_id}', [VariantController::class, 'addVariant'])->name('addVariant');
    Route::post('add-variant/{product_id}', [VariantController::class, 'addPostVariant'])->name('addPostVariant');
    Route::get('edit-variant/{id}', [VariantController::class, 'editVariant'])->name('editVariant');
    Route::put('edit-variant/{id}', [VariantController::class, 'editPutVariant'])->name('editPutVariant');
    Route::delete('delete-variant/{id}', [VariantController::class, 'deleteVariant'])->name('deleteVariant');
});
/* -------------------------------- BIẾN THỂ -------------------------------- */

/* -------------------------------- FLASH SALE -------------------------------- */
Route::prefix('/flash-sale')->name('flash_sale.')->group(function () {
    Route::get('/', [FlashSaleController::class, 'index'])->name('index');
    Route::get('/show/{id}', [FlashSaleController::class, 'show'])->name('show');
    Route::get('/create', [FlashSaleController::class, 'create'])->name('create');
    Route::post('/store', [FlashSaleController::class, 'store'])->name('store');
    Route::put('/update/{id}', [FlashSaleController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [FlashSaleController::class, 'delete'])->name('delete');
});
/* -------------------------------- FLASH SALE -------------------------------- */

// Thêm vào giỏ hàng
// Route để xem giỏ hàng
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

// Route để cập nhật số lượng sản phẩm
Route::post('/cart/update/{key}', [CartController::class, 'updateQuantity'])->name('cart.update');

// Route để xóa sản phẩm khỏi giỏ hàng
Route::get('/cart/remove/{key}', [CartController::class, 'removeCartItem'])->name('cart.remove');
// Thêm sản phẩm vào giỏ hàng
Route::post('/cart/add/{product}', [CartController::class, 'addCart'])->name('cart.add');


Route::post('/cart/applyCoupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

