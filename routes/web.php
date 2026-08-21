<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'home']);
Route::view('/about', 'site.about');
Route::view('/contact', 'site.contact');
Route::post('/contact', [OrderController::class, 'contact'])->name('contact.store');
Route::get('/our-work', [SiteController::class, 'ourWork']);
Route::get('/sitemap.xml', [SiteController::class, 'sitemap'])->name('sitemap');
Route::get('/service-area', [SiteController::class, 'serviceArea']);
Route::get('/services', [SiteController::class, 'services']);
Route::get('/faq', [SiteController::class, 'faq']);
Route::view('/quote', 'site.quote');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/photos', [OrderController::class, 'uploadPhotos'])->name('orders.photos');
Route::post('/orders/photos/remove', [OrderController::class, 'removePhoto'])->name('orders.photos.remove');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
    Route::get('/forgot-password', [AdminAuthController::class, 'showForgotPasswordForm'])->name('admin.password.request');
    Route::post('/forgot-password', [AdminAuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/reset-password/{token}', [AdminAuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.password.update');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->middleware('auth')->name('admin.logout');
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::put('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password');
        Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/orders/{id}', [AdminController::class, 'showOrder'])->whereNumber('id')->name('admin.order.show');
        Route::delete('/works/{id}', [AdminController::class, 'destroyWork'])->whereNumber('id')->name('admin.works.destroy');
        Route::get('/{type}', [AdminController::class, 'index'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.index');
        Route::get('/{type}/create', [AdminController::class, 'create'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.create');
        Route::post('/{type}', [AdminController::class, 'store'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.store');
        Route::get('/{type}/{id}/edit', [AdminController::class, 'edit'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.edit');
        Route::put('/{type}/{id}', [AdminController::class, 'update'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.update');
        Route::delete('/{type}/{id}', [AdminController::class, 'destroy'])->where('type', 'services|areas|works|quote-options|faqs')->name('admin.destroy');
    });
});
