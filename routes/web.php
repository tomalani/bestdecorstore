<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProductsController;
use app\Http\Controllers\CategoriesController;
use app\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('landing');
});


Auth::routes();

// backend products
Route::get('/backend/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('backend-products');
Route::get('/backend/products/add', [App\Http\Controllers\ProductsController::class, 'add']);
Route::post('/backend/products/insert', [App\Http\Controllers\ProductsController::class, 'insert']);
Route::get('/backend/products/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit']);
Route::post('/backend/products/update', [App\Http\Controllers\ProductsController::class, 'update']);

// backend categories
Route::get('/backend/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('backend-categories');;
Route::get('/backend/categories/add', [App\Http\Controllers\CategoriesController::class, 'add']);
Route::post('/backend/categories/insert', [App\Http\Controllers\CategoriesController::class, 'insert']);
Route::get('/backend/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit']);
Route::post('/backend/categories/update', [App\Http\Controllers\CategoriesController::class, 'update']);

// backend users
Route::get('/backend/users', [App\Http\Controllers\UsersController::class, 'index']);
