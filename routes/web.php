<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProductsController;
use app\Http\Controllers\CategoriesController;
use app\Http\Controllers\UsersController;
use app\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('landing');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\OrderController::class, 'cart'])->name('cart');
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
Route::post('/order-save', [App\Http\Controllers\OrderController::class, 'orderSave'])->name('order-save');
Route::get('/order-success', [App\Http\Controllers\OrderController::class, 'orderSuccess'])->name('order-success');

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [App\Http\Controllers\HomeController::class, 'shopDetail'])->name('shop-detail');

Auth::routes();
Route::middleware(['auth.check'])->group(function () {
    // backend products
    Route::get('/backend/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('backend-products');
    Route::get('/backend/products/add', [App\Http\Controllers\ProductsController::class, 'add']);
    Route::post('/backend/products/insert', [App\Http\Controllers\ProductsController::class, 'insert']);
    Route::get('/backend/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('product-edit');
    Route::post('/backend/products/update', [App\Http\Controllers\ProductsController::class, 'update']);

    Route::post('/backend/uploads-image', [App\Http\Controllers\ProductsController::class, 'uploadsImgProduct'])->name('uploadsImgProduct');
    Route::post('/backend/del-product-image', [App\Http\Controllers\ProductsController::class, 'delProductImg'])->name('delProductImg');

    Route::post('/uploads-file-image', [App\Http\Controllers\ProductsController::class, 'uploadsImgProduct']);

    // backend categories
    Route::get('/backend/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('backend-categories');
    ;
    Route::get('/backend/categories/add', [App\Http\Controllers\CategoriesController::class, 'add']);
    Route::post('/backend/categories/insert', [App\Http\Controllers\CategoriesController::class, 'insert']);
    Route::get('/backend/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit']);
    Route::post('/backend/categories/update', [App\Http\Controllers\CategoriesController::class, 'update']);

    // backend user
    Route::get('/backend/users', [App\Http\Controllers\UsersController::class, 'index'])->name('backend-users');
    ;
    Route::get('/backend/users/add', [App\Http\Controllers\CategoriesController::class, 'add']);
    Route::post('/backend/users/insert', [App\Http\Controllers\CategoriesController::class, 'insert']);
    Route::get('/backend/users/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit']);
    Route::get('/backend/users/delete/{id}', [App\Http\Controllers\CategoriesController::class, 'delete']);
    Route::post('/backend/users/update', [App\Http\Controllers\CategoriesController::class, 'update']);

    // backend order
    Route::get('/backend/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('backend-orders');
    Route::get('/backend/orders/add', [App\Http\Controllers\OrderController::class, 'add']);
    Route::post('/backend/orders/insert', [App\Http\Controllers\OrderController::class, 'insert']);
    Route::get('/backend/orders/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit']);
    Route::get('/backend/orders/delete/{id}', [App\Http\Controllers\OrderController::class, 'delete']);
    Route::post('/backend/orders/update', [App\Http\Controllers\OrderController::class, 'update']);

    Route::post('/backend/orders/confirm-order', [App\Http\Controllers\OrderController::class, 'confirm_order']);
    Route::post('/backend/orders/shipped-order', [App\Http\Controllers\OrderController::class, 'shipped_order']);
    Route::post('/backend/orders/delivery-order', [App\Http\Controllers\OrderController::class, 'delivery_order']);
    Route::get('/backend/orders/reject-order/{id}', [App\Http\Controllers\OrderController::class, 'reject_order']);

    //ajax backend order
    Route::get('/backend/ajax-orders-item', [App\Http\Controllers\OrderController::class, 'ajax_order_items'])->name('backend.orders.item.ajax');
});
