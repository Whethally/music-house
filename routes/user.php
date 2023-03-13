<?php

use App\Http\Controllers\User\UserController;
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

Route::prefix('user')->middleware('auth')->group(function(){
    // Route::prefix('user')->group(function(){
    
        Route::redirect('/', '/user/profile')->name('profile');
    
        Route::resource('profile', UserController::class)->names([
            'index' => 'profile',
            'create' => 'profile.create',
            'store' => 'profile.store',
            'show' => 'profile.show',
            'edit' => 'profile.edit',
            'update' => 'profile.update',
            'destroy' => 'profile.destroy',
        ]);

        Route::post('logout', [UserController::class, 'logout'])->name('logout');

        Route::get('orders', [UserController::class, 'orders'])->name('orders');
        Route::get('show/{id}', [UserController::class, 'orderShow'])->name('orders.show');
        Route::post('cancel/{id}', [UserController::class, 'orderCancel'])->name('orders.cancel');
    });

    Route::post('logout', [UserController::class, 'logout'])->name('logout');