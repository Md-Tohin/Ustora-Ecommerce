<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\backend\CartController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use Laravel\Jetstream\Rules\Role;

//  home page routes
Route::get('/', [FrontendController::class, "index"])->name("frontend.home");
//  shop products routes
Route::get('/shop/{id?}', [FrontendController::class, "shop"])->name("frontend.shop");
//  single page routes
Route::get('/single-product/{id}', [FrontendController::class, "singleProduct"])->name("frontend.single_product");

//  cart routes
Route::get('/cart', [CartController::class, "cart"])->name("frontend.cart");
Route::post('user/cart/store', [CartController::class, 'storeCart'])->name('cart.store');
Route::get('user/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.item-delete');
Route::post('user/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');

//  checkout routes
Route::get('/checkout', [FrontendController::class, "checkout"])->name("frontend.checkout");

//  order routes
Route::post('order/store', [OrderController::class, 'orderStore'])->name('order.store');

//  thanks routes
Route::get('/thanks', [OrderController::class, 'thanks'])->name('frontend.thanks');

//  user order view
Route::get('/user/orders', [UserController::class, 'orders'])->name('user.order.view');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, "dashboard"])->name('dashboard');
    //  category
    Route::get('/category/add', [CategoryController::class, "addCategory"])->name('add.category');
    Route::post('/category/store', [CategoryController::class, "storeCategory"])->name('store.category');
    Route::get('/category/manage', [CategoryController::class, "manageCategory"])->name('manage.category');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('update.category');

    //  product
    Route::get('/product/manage', [ProductController::class, 'manageProduct'])->name('manage.product');
    Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add.product');
    Route::post('/product/store', [ProductController::class, 'storeProduct'])->name('store.product');
    Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('/product/update', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::get('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');

    //  sliders
    Route::get('/slider/manage', [SliderController::class, 'manageSlider'])->name('manage.slider');
    Route::get('/slider/add', [SliderController::class, 'addSlider'])->name('add.slider');
    Route::post('/slider/store', [SliderController::class, 'storeSlider'])->name('store.slider');
    Route::get('/slider/edit/{slider_id}', [SliderController::class, 'editSlider'])->name('edit.slider');

    //  brand
    Route::resource('brands', BrandController::class);

});
