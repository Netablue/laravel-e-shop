<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
Auth::routes();

// GUEST - USER ==============================================
// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// Main pages
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/category', [HomeController::class, 'category'])->name('category');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/elements', [HomeController::class, 'elements'])->name('elements');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single-blog');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/{product}/save', [CartController::class, 'save'])->name('cart.save');
Route::delete('/cart/{product}', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/confirmation', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/thanks', [HomeController::class, 'thanks'])->name('thanks');
Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');


//========
// ADMIN =
//========
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});