<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth:web', 'verified'])->name('dashboard');

// Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get("/product/{product}", [ProductController::class, 'details'])->name("product.details");

Route::get("/shop", [ProductController::class, 'publicIndex'])->name("shop.index");


// User Routes
Route::middleware('auth:web')->group(function () {
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Wishlist Routes
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // Profile Routes
    Route::get("/profile", [ProfileController::class, 'edit'])->name("profile.edit");
    Route::put("/profile/update", [ProfileController::class, 'update'])->name("profile.update");

    // checkout
    Route::get("/checkout", [CheckoutController::class, 'index'])->name("checkout");

    // Orders
    Route::get("/orders", [OrderController::class, 'index'])->name("orders.index");
    Route::post("/orders", [OrderController::class, 'store'])->name("orders.store");

    // Paypal
    Route::get('paypal/payment/{order}', [PayPalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success/{order}', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel/{order}', [PayPalController::class, 'paymentCancel'])->name('paypal.payment.cancel');
});


// Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::resource('admin/categories', CategoryController::class)->names('admin.categories');
    Route::resource('admin/products', ProductController::class)->names('admin.products');

    // Admin Orders
    Route::get('admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update-status');

    // Admin Users
    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
