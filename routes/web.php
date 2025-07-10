<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WishlistController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Seller Controllers
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Seller\ProfileController as SellerProfileController;

use App\Http\Controllers\Auth\ForgotPasswordOtpController;
use App\Http\Controllers\Auth\ResetPasswordOtpController;

use App\Http\Controllers\StoreProfileController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == RUTE PUBLIK / PEMBELI ==
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/blog', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/blog/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle')->middleware('auth');
Route::get('/toko/{user:store_slug}', [StoreProfileController::class, 'show'])->name('stores.show');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// == RUTE DISPATCHER SETELAH LOGIN ==
// Rute ini menangkap redirect default ke '/dashboard' dan mengarahkannya
// ke dashboard yang sesuai berdasarkan peran pengguna.
Route::get('/dashboard', function () {
    if (Auth::user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('seller.dashboard');
})->middleware(['auth'])->name('dashboard');


// == RUTE PENJUAL (UMKM) ==
Route::middleware(['auth'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/products', SellerProductController::class);
    Route::get('/profile', [SellerProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [SellerProfileController::class, 'update'])->name('profile.update');
});


// == RUTE ADMIN ==
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', AdminCategoryController::class)->except(['show']);
    Route::resource('/articles', AdminArticleController::class);
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('users.toggleStatus');
    Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
});

// Halaman Lupa Password akan mengirim request ke sini untuk mengirim OTP
Route::post('/forgot-password-otp', [ForgotPasswordOtpController::class, 'sendOtp'])->name('otp.send');

// Halaman untuk menampilkan formulir verifikasi OTP
Route::get('/verify-otp', [ResetPasswordOtpController::class, 'showVerifyForm'])->name('otp.verify.form');

// Rute untuk memproses OTP yang dimasukkan pengguna
Route::post('/verify-otp', [ResetPasswordOtpController::class, 'verifyOtp'])->name('otp.verify');

// Halaman untuk menampilkan formulir reset password baru
Route::get('/reset-password-otp', [ResetPasswordOtpController::class, 'showResetForm'])->name('password.reset.otp');

// Rute untuk menyimpan password baru
Route::post('/reset-password-otp', [ResetPasswordOtpController::class, 'resetPassword'])->name('password.update.otp');

Route::get('/tentang-kami', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

// Rute default Breeze biasanya ada di sini, pastikan tidak ada duplikat Route::get('/')
require __DIR__.'/auth.php';
