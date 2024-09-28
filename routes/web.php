<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenController;

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


use App\Http\Controllers\CartController;
use Illuminate\Routing\Router;
use App\Http\Controllers\SearchController;


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


Route::get('/', function () {
    return view('clients.index');
})->name('index');

// Route::get('/shop', function () {
//     return view('clients.shop');
// });


Route::get('/', [HomeUserController::class, 'index']);
Route::get('/index', [HomeUserController::class, 'index']);
Route::get('/index/{id}', [HomeUserController::class, 'show']);

Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/search-product', [SearchController::class, 'searchProduct'])->name('search.product');


Route::get('cart', function () {
    return view('clients.cart');
});

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



Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
    Route::get('update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::put('update-product/{id}', [ProductController::class, 'updatePutProduct'])->name('updatePutProduct');
    Route::delete('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});
// them gio hang
Route::group(['prefix'=> 'cart'], function(){
        // Router::get('/cart',[CartController::class, 'view'])->name('cart.view');
        // Router::get('/cart/{product}',[CartController::class, 'addToCart'])->name('cart.add');
        Route::get('/cart',[CartController::class, 'view'])->name('cart.view');
        Route::get('/cart/{product}',[CartController::class, 'addCart'])->name('cart.add');

});




