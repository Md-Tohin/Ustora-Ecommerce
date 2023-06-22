<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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

Route::get('/', [FrontendController::class, "index"])->name("frontend.home");
Route::get('/shop', [FrontendController::class, "shop"])->name("frontend.shop");
Route::get('/single-product/{id}', [FrontendController::class, "singleProduct"])->name("frontend.single_product");
Route::get('/cart', [FrontendController::class, "cart"])->name("frontend.cart");
Route::get('/checkout', [FrontendController::class, "checkout"])->name("frontend.checkout");






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

    //  brand
    Route::resource('brands', BrandController::class);

});
