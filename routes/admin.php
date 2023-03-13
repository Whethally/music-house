<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware('auth', 'admin')->group(function(){

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('store', [AdminController::class, 'store'])->name('admin.store');

    Route::get('dashboard/index_product', [AdminController::class, 'index_product'])->name('dashboard.index_product');
    Route::post('store_product', [AdminController::class, 'store_product'])->name('admin.store_product');

    Route::get('dashboard/index_all_products', [AdminController::class, 'index_all_products'])->name('dashboard.index_all_products');
    // post dashboard edit and delete product
    Route::get('dashboard/edit_product/{id}', [AdminController::class, 'edit_product'])->name('dashboard.edit_product');
    Route::put('dashboard/update_product/{id}', [AdminController::class, 'update_product'])->name('dashboard.update_product');
    Route::delete('dashboard/delete_product/{id}', [AdminController::class, 'delete_product'])->name('dashboard.delete_product');

    // dashboard category routes
    Route::get('category', [AdminController::class, 'index_category'])->name('category.index');
    Route::get('category/add', [AdminController::class, 'add_category'])->name('category.add');
    Route::post('category', [AdminController::class, 'store_category'])->name('category.store');
    Route::get('category/all', [AdminController::class, 'all_category'])->name('category.all');
    Route::delete('category/delete_category/{id}', [AdminController::class, 'delete_category'])->name('category.delete');

    // admin orders routes
    Route::get('orders', [AdminController::class, 'index_orders'])->name('admin.orders');
    Route::get('orders/all', [AdminController::class, 'all_orders'])->name('admin.show_orders');
    Route::delete('orders/delete_order/{id}', [AdminController::class, 'delete_order'])->name('orders.delete_order');
    Route::get('orders/show_order/{id}', [AdminController::class, 'show_order'])->name('admin.orders.show_order');
    Route::put('orders/update_order/{id}', [AdminController::class, 'update_order'])->name('admin.orders.update_order');
});