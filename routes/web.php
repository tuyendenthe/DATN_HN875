<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/shop', function () {
    return view('clients.shop');
});

Route::get('/index', function () {
    return view('clients.index');
});

Route::get('cart', function () {
    return view('clients.cart');
});

Route::get('checkout', function () {
    return view('clients.checkout');
});

Route::get('/blog', function () {
    return view('clients.blog');
});

Route::get('/about', function () {
    return view('clients.about');
});

Route::get('/single_product', function () {
    return view('clients.single_product');
});

Route::get('/single_blog', function () {
    return view('clients.single_blog');
});

Route::get('/register', function () {
    return view('clients.register');
});
Route::get('/login', function () {
    return view('clients.login');
});

Route::prefix('admin1')->group(function() {
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



