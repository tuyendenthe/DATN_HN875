<?php

use App\Http\Controllers\Banner_coverController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookFixController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\ProductVariantsController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\VnPayController;
use App\Models\Memory;
use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserNewController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ChatsController;


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Routing\Router;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\FlashSaleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Storage;
use App\Mail\TestMail;

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



Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/filter-by-category/{id}', [ShopController::class, 'shopWithCategories'])->name('shopWithCategories');
Route::get('/shop/filter-by-price/{priceRange}', [ShopController::class, 'shopWithRange'])->name('shop.filterByPrice');
Route::get('/search-products', [HomeUserController::class, 'searchProducts'])->name('search.products');
Route::get('/shop/filter-by-color/{selectedColor}', [ShopController::class, 'shopWithColor'])->name('shop.filterByColor');
Route::get('/filter-flash-sales', [ShopController::class, 'flashSales'])->name('shop.flashSales');
// Route::get('/send-test-mail', function () {
//     Mail::to('hvt910tranvantuyen@gmail.com')->send(new TestMail());
//     return 'Test email sent successfully!';
// });

// Route::get('/', function () {
//     return view('clients.index');
// })->name('index');

// Route::get('/shop', function () {S
//     return view('clients.shop');
// });


// Route::get('/', [HomeUserController::class, 'index']);
// Route::get('/index', [HomeUserController::class, 'index']);
Route::get('/index/{id}', [HomeUserController::class, 'show']);

Route::get('/index', [HomeUserController::class, 'index'])->name('home');

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
Route::get('/search-order', [SearchController::class, 'searchCheckout'])->name('search.order');
Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
Route::get('/list', [CheckoutController::class, 'list'])->name('order.list');


// Route::get('contact', function () {
//     return view('clients.contact');
// });

Route::post('/post-review', [ReviewsController::class, 'postReview'])->name('post.review');
Route::middleware('auth')->prefix('admin1/comment')->group(function() {
    Route::get('/', [ReviewsController::class, 'listComment'])->name('list-comment');
    Route::delete('/comment/{id}', [ReviewsController::class, 'deleteComment'])->name('delete-comment');
    Route::post('/update-status', [ReviewsController::class, 'updateStatus'])->name('update-status');
});



Route::get('checkout', function () {
    return view('clients.checkout');
});


Route::get('/blog', [PostController::class, 'clientIndex'])->name('blog');
Route::get('/single_blog/{post}', [PostController::class, 'clientShow'])->name('single_blog');


// Route::get('/single_blog', function () {
//     return view('clients.single_blog');
// })->name('single_blog');

Route::get('/about', function () {
    return view('clients.about');
})->name('about');

//Route::get('/single_product/{id}', function () {
//    return view('clients.single_product');
//})->name('single_product');
Route::get('/single_product/{id}', [HomeUserController::class, 'show'])->name('single_product');

Route::get('/test', function () {
    return view('clients.review');
});

// // Route cho client
// // Route cho client
// Route::middleware('auth')->group(function () {

// });

Route::get('login',[AuthenController::class,'login'])->name('login');
Route::post('login',[AuthenController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthenController::class,'logout'])->name('logout');
Route::get('register',[AuthenController::class,'register'])->name('register');
Route::post('register',[AuthenController::class,'postRegister'])->name('postRegister');
Route::middleware(['auth'])->group(function () {
    Route::get('account/edit', [AuthenController::class, 'editUser'])->name('account.edit');
    Route::put('account/update', [AuthenController::class, 'updateUser'])->name('account.update');
    Route::get('client/change-password', [AuthenController::class, 'showChangePasswordForm'])->name('client.change.password.form');
    Route::post('client/change-password', [AuthenController::class, 'changePassword'])->name('client.change.password');
});

Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');
// Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('notifications.index');
// Route::get('/admin/notifications/read/{id}', [AdminController::class, 'markAsRead'])->name('notifications.read');
Route::group(['prefix' => 'admin1', 'middleware' => 'checkAdmin'], function() {
    Route::get('/dashboard', function () {
        return view('admins.dashboard');
    })->name('dashboard');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications.index');
    Route::get('/notifications/read/{id}', [AdminController::class, 'markAsRead'])->name('notifications.read');
    Route::get('/search-user', [UserController::class, 'searchUser'])->name('search.user');
    // CRUD user
    Route::get('/listUser', [UserController::class, 'listUser'])->name('admin1.users.listuser');
    Route::get('/createUser', [UserController::class, 'addUser'])->name('admin1.users.adduser'); // Đặt tên route
    Route::post('/createUser', [UserController::class, 'store'])->name('admin1.users.store');
    Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('admin1.users.edit');
    Route::put('/editUser/{id}', [UserController::class, 'update'])->name('admin1.users.update');
    Route::delete('/deleteUser/{id}', [UserController::class, 'destroy'])->name('admin1.users.destroy');
    Route::get('/detailUser/{id}', [UserController::class, 'detail'])->name('admin1.users.detail');

    Route::get('admin/change-password', [UserController::class, 'showChangePasswordForm'])->name('admin.change.password.form');
    Route::post('admin/change-password', [UserController::class, 'changePassword'])->name('admin.change.password');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'editUser'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [UserController::class, 'updateUser'])->name('admin.users.update');
  // CRUD voucher
  Route::get('/vouchers', [VoucherController::class, 'index'])->name('admin1.vouchers.index');
  Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('admin1.vouchers.create');
  Route::post('/vouchers', [VoucherController::class, 'store'])->name('admin1.vouchers.store');
  Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('admin1.vouchers.edit');
  Route::put('/vouchers/{voucher}', [VoucherController::class, 'update'])->name('admin1.vouchers.update');
  Route::delete('/vouchers/{voucher}', [VoucherController::class, 'destroy'])->name('admin1.vouchers.destroy');
    // Route::get('/chart', function () {
    //     return view('admins.chart');
    // })->name('chart');
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
    Route::get('/product_statistics', [ChartController::class, 'product_statistics'])->name('product_statistics');
    Route::get('/best_selling', [ChartController::class, 'best_selling'])->name('best_selling');
    Route::get('/inventory_product', [ChartController::class, 'inventory_product'])->name('inventory_product');
//    Route::resource('admin1/memories', MemoryC::class);



    Route::post('/toggleUserStatus/{id}', [UserController::class, 'toggleStatus'])->name('admin1.users.toggleStatus');
    // Route::get('/chart', function () {
    //     return view('admins.chart');
    // })->name('chart');


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
Route::resource('admin1/rams', RamController::class);
Route::resource('admin1/memories', MemoryController::class);

Route::resource('admin1/category', CategoryController::class);
Route::patch('admin1/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');

Route::resource('admin1/category_post', CategoryPostController::class);
Route::resource('admin1/post', PostController::class);

Route::resource('admin1/banner', BannerController::class);
Route::resource('admin1/banner_cover', Banner_coverController::class);

Route::resource('admin1/contact', ContactController::class);
Route::patch('/contact/{contact}/success', [ContactController::class, 'updateSuccess'])->name('contact.success');
Route::patch('/contact/{contact}/failed', [ContactController::class, 'updateFailed'])->name('contact.failed');
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');


Route::resource('admin1/bookfix', BookFixController::class);
Route::patch('/bookfix/{BookFixs}/success', [BookFixController::class, 'updateSuccess'])->name('bookfix.success');
Route::patch('/bookfix/{BookFixs}/failed', [BookFixController::class, 'updateFailed'])->name('bookfix.failed');
Route::patch('/bookfix/{bookfix}/schedule', [BookFixController::class, 'updateSchedule'])->name('bookfix.schedule');
Route::patch('bookfix/success/{contact}', [BookFixController::class, 'markAsScheduled'])->name('bookfix.success');





Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
    Route::get('update-product/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::put('update-product/{id}', [ProductController::class, 'updatePutProduct'])->name('updatePutProduct');
    Route::post('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('cancel-delete-product/{id}', [ProductController::class, 'cancedeleteProduct'])->name('cancedeleteProduct');
    Route::get('variants/view/{id}', [ProductVariantsController::class, 'index'])->name('variants.index');
    Route::get('variants/create/{id}', [ProductVariantsController::class, 'create'])->name('variants.create');
    Route::get('variants/edit/{id}', [ProductVariantsController::class, 'edit'])->name('variants.edit');
    Route::post('variants/store/{id}', [ProductVariantsController::class, 'store'])->name('variants.store');
    Route::put('variants/update/{id}', [ProductVariantsController::class, 'update'])->name('variants.update');
    Route::delete('variants/delete/{id}', [ProductVariantsController::class, 'destroy'])->name('variants.destroy');
});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('index',[CategoriesController::class,'index'])->name('index');
    Route::get('create',[CategoriesController::class,'create'])->name('create');
    Route::post('store',[CategoriesController::class,'store'])->name('store');
    Route::get('delete',[CategoriesController::class,'delete'])->name('delete');
    Route::get('edit/{id}',[CategoriesController::class,'edit'])->name('edit');
    Route::post('update',[CategoriesController::class,'update'])->name('update');
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
Route::post('/cart/add1', [CartController::class, 'addCart1'])->name('cart.add1');



Route::post('/cart/applyCoupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
/* -------------------------------- checkout -------------------------------- */
Route::prefix('/checkout')->name('checkout.')->group(function () {
    Route::post('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/store', [CheckoutController::class, 'store'])->name('store');
    Route::get('/success', [CheckoutController::class, 'ok'])->name('success');
    Route::get('/list', [CheckoutController::class, 'list'])->name('list');
    Route::get('/status/{id}', [CheckoutController::class, 'status'])->name('status');
    Route::get('/history', [CheckoutController::class, 'history'])->name('history');
    Route::get('/detail/{bill_code}', [CheckoutController::class, 'detail'])->name('detail');
    Route::get('/edit/{bill_code}', [CheckoutController::class, 'edit'])->name('edit');
    Route::put('/edit/{bill_code}', [CheckoutController::class, 'editput'])->name('editput');
    Route::post('/updatestatus/{id}', [CheckoutController::class, 'updatestatus'])->name('updatestatus');

});



/* -------------------------------- checkout -------------------------------- */
/* -------------------------------- bill -------------------------------- */
Route::prefix('/bill')->name('bill.')->group(function () {
    Route::get('/', [CheckoutController::class, 'bills_client'])->name('bills_client');
    Route::get('/bills_details/{bill_code}', [CheckoutController::class, 'bills_details'])->name('bills_details');
    Route::post('/bill_cancel/{bill_code}', [CheckoutController::class, 'cancel'])->name('bill_cancel');
});

/* -------------------------------- end_bill -------------------------------- */
/* -------------------------------- check order -------------------------------- */
Route::get('/check_order', [CheckoutController::class, 'check_order'])->name('check_order');


Route::post('/search_order', [CheckoutController::class, 'search_order'])->name(name: 'search_order');
/* -------------------------------- check order -------------------------------- */

Route::post('/checkPay', [CheckoutController::class, 'checkPay'])->name(name: 'checkPay');

Route::get('/orders/detail/{bill_code}', [CheckoutController::class, 'orderDetail'])->name('orders.detail');

// Hiển thị danh sách sản phẩm
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

// Lọc sản phẩm theo danh mục
Route::get('/shop/filter-by-category/{id}', [ShopController::class, 'shopWithCategories'])->name('shopWithCategories');

Route::post('/checkPay', [CheckoutController::class, 'checkPay'])->name(name: 'checkPay');
Route::post('/search_order', [CheckoutController::class, 'search_order'])->name('search_order');

Route::get('/my-orders', [CheckoutController::class, 'myOrders'])->name('my.orders')->middleware('auth');
Route::get('/payment', [VnPayController::class, 'createPayment'])->name('payment.create');
Route::get('/vnpay-return', [VnPayController::class, 'vnpayReturn'])->name('vnpay.return');



Route::post('/user/save', [UserNewController::class, 'save'])->name('user.save');
Route::get('/user/check', [UserNewController::class, 'check'])->name('user.check');
Route::get('/user/logout', [UserNewController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserNewController::class, 'profile'])->name('user.profile');
Route::get('/user/login', [UserNewController::class, 'login'])->name('user.login');
Route::get('/user/profile', [UserNewController::class, 'profile'])->name('user.profile');
Route::get('/user/register', [UserNewController::class, 'register'])->name('user.register');
Route::get('/user/profileview', [UserNewController::class, 'profile'])->name('user.profileview');
Route::get('/user/profileedit', [UserNewController::class, 'edit'])->name('user.profileedit');
Route::get('/user/chats', [UserNewController::class, 'chats'])->name('user.chats');
Route::put('/user/updateProfile', [UserNewController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/user/dashboard', [UserNewController::class, 'dashboard'])->name('user.dashboard');




Route::post('/admin/save', [AdminsController::class, 'save'])->name('admin.save');
Route::get('/admin1/check123', [AdminsController::class, 'check'])->name('admin1.check123');
Route::get('/admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');
Route::get('/admin/profileview', [AdminsController::class, 'profile'])->name('admin.profileview');
Route::get('/admin/profileedit', [AdminsController::class, 'edit'])->name('admin.profileedit');
Route::get('/admin/login', [AdminsController::class, 'login'])->name('admin.login');
Route::get('/admin/profile', [AdminsController::class, 'profile'])->name('admin.profile');
Route::get('/admin/register', [AdminsController::class, 'register'])->name('admin.register');
Route::get('/admin1/chats_123', [AdminsController::class, 'chats'])->name('admin.chats_123');
Route::get('/admin1/dashboard_123', [AdminsController::class, 'dashboard'])->name('admin.dashboard_123');
Route::put('/admin/updateProfile', [AdminsController::class, 'updateProfile'])->name('admin.updateProfile');



Route::get('/admin1/fetch-messages', [ChatsController::class, 'fetchMessages'])->name('admin.fetchMessages_123');
Route::post('/admin1/send-message', [ChatsController::class, 'sendMessage'])->name('admin.sendMessage_123');
Route::get('/fetch-messages', [ChatsController::class, 'fetchMessagesFromUserToAdmin'])->name('fetch.messagesFromSellerToAdmin');
Route::post('/send-message', [ChatsController::class, 'sendMessageFromUserToAdmin'])->name('send.Messageofsellertoadmin');
