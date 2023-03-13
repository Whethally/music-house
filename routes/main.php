<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('about/{id}', [HomeController::class, 'show'])->name('home.show');

    Route::post('', function (Illuminate\Http\Request $request) {
        session(['theme' => $request->input('theme')]);
        return back();
    })->name('theme.change');

    Route::get('load-more', [HomeController::class, 'loadMore'])->name('products.load-more');

    Route::get('cart', [HomeController::class, 'cart'])->name('cart');
    Route::post('add-to-cart', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::post('cart/{id}', [HomeController::class, 'updateCart'])->name('cart.update');
    Route::delete('cart/{id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
    Route::delete('cart', [HomeController::class, 'clearCart'])->name('cart.clear');

    Route::get('checkout', [HomeController::class, 'checkout'])->name('cart.checkout');
    Route::post('checkout', [HomeController::class, 'checkoutStore'])->name('cart.checkout.store');

    Route::get('checkout/step-one', [HomeController::class, 'checkoutStepOne'])->name('cart.checkout.step-one');
    Route::post('checkout/step-one', [HomeController::class, 'checkoutStepOneStore'])->name('cart.checkout.step-one.store');

    Route::get('checkout/step-two', [HomeController::class, 'checkoutStepTwo'])->name('cart.checkout.step-two');
    Route::post('checkout/step-two', [HomeController::class, 'checkoutStepTwoStore'])->name('cart.checkout.step-two.store');
});

// route prefix auth with controller register and login

Route::prefix('auth')->middleware('guest', 'web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'loginStepOne'])->name('login.step-one');
    Route::get('/login/step-two', [LoginController::class, 'showPasswordForm'])->name('login.step-two');
    Route::post('/login/step-two', [LoginController::class, 'loginStepTwo'])->name('login.step-two');

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});