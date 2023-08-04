<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
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


Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/productCategory/{slug}', CategoryComponent::class)->name('product_category');
Route::get('/product.search', SearchComponent::class)->name('product.search');
Route::get('/Contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact_store', [ContactController::class, 'store'])->name('contact.store');


Route::middleware('auth:web')->group(function () {
    Route::get('/cart', CartComponent::class)->name('shop.cart');
    Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/PlaceOrder', [OrderController::class, 'store'])->name('place_order');
    Route::get('/MyOrders', [OrderController::class, 'index'])->name('MyOrders');
    Route::get('view-order/{id}', [OrderController::class, 'show']);


});

Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admins.login');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

