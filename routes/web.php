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
Route::view('/quote', 'site.quote');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('/orders/photos', [OrderController::class, 'uploadPhotos'])->name('orders.photos');
Route::post('/orders/photos/remove', [OrderController::class, 'removePhoto'])->name('orders.photos.remove');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->middleware('auth')->name('admin.logout');
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/orders/{id}', [AdminController::class, 'showOrder'])->whereNumber('id')->name('admin.order.show');
        Route::get('/{type}', [AdminController::class, 'index'])->where('type', 'services|areas|works|quote-options')->name('admin.index');
        Route::get('/{type}/create', [AdminController::class, 'create'])->where('type', 'services|areas|works|quote-options')->name('admin.create');
        Route::post('/{type}', [AdminController::class, 'store'])->where('type', 'services|areas|works|quote-options')->name('admin.store');
        Route::get('/{type}/{id}/edit', [AdminController::class, 'edit'])->where('type', 'services|areas|works|quote-options')->name('admin.edit');
        Route::put('/{type}/{id}', [AdminController::class, 'update'])->where('type', 'services|areas|works|quote-options')->name('admin.update');
        Route::delete('/{type}/{id}', [AdminController::class, 'destroy'])->where('type', 'services|areas|works|quote-options')->name('admin.destroy');
    });
});
