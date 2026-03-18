<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\ContactInquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-inquiries', [ContactInquiryController::class, 'store'])->name('contact-inquiries.store');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::patch('/inquiries/{inquiry}/read', [InquiryController::class, 'markRead'])->name('inquiries.mark-read');
    Route::patch('/inquiries/{inquiry}/unread', [InquiryController::class, 'markUnread'])->name('inquiries.mark-unread');
    Route::get('/settings/general', [GeneralSettingController::class, 'edit'])->name('settings.general.edit');
    Route::put('/settings/general', [GeneralSettingController::class, 'update'])->name('settings.general.update');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';