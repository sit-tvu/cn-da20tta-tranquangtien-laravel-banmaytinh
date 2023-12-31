<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/', [App\Http\Controllers\ProductController::class, 'showAllProducts'])->name('home');

// Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('product.detail');

Route::get('/{category}/{brand}/{slug}', [App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('product.detail');
Route::post('/add-to-cart/{slug}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\ProductController::class, 'showCart'])->name('cart');
Route::get('/clear-cart', [App\Http\Controllers\ProductController::class, 'clearCart'])->name('cart.clear');
Route::get('/remove-from-cart/{productId}', [App\Http\Controllers\ProductController::class, 'removeFromCart'])->name('removeFromCart');
Route::post('/update-cart', [App\Http\Controllers\ProductController::class, 'updateCart'])->middleware('web')->name('updateCart');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');




// Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
//dashboard routes
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });
    Route::controller(App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/brand', 'index');
        Route::get('/brand/create', 'create');
        Route::post('/brand','store');
        Route::get('/brand/{brand_id}/edit', 'edit');
        Route::put('/brand/{brand_id}', 'update');
        Route::get('/brand/{brand_id}/delete', 'destroy');
    });
    
        Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
            Route::get('/products','index');
            Route::get('/products/create','create');
            Route::post('/products','store');
            Route::get('/products/{product}/edit','edit');
            Route::put('/products/{product}','update');
            Route::get('products/{product_id}/delete','destroy');
            Route::get('product-image/{product_image_id}/delete','destroyImage');
        });
        Route::controller(App\Http\Controllers\Admin\AdminUserController::class)->group(function(){
            Route::get('/users','index');
        });

});