<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Landing;
use App\Livewire\Services;
use App\Livewire\Portfolio;
use App\Livewire\Contact;
use App\Livewire\ServiceDetail;
use App\Livewire\PortfolioDetail;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortfolioController;

// Public Routes
Route::get('/', Landing::class)->name('landing');
Route::get('/services', Services::class)->name('services');
Route::get('/portfolio', Portfolio::class)->name('portfolio');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/services/{service}', ServiceDetail::class)->name('service.detail');
Route::get('/portfolio/{project}', PortfolioDetail::class)->name('portfolio.detail');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

        // Services
        Route::resource('services', ServiceController::class);

        // Menus (only edit/update, no create/delete)
        Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/menus/{menuItem}/edit', [MenuController::class, 'edit'])->name('menus.edit');
        Route::put('/menus/{menuItem}', [MenuController::class, 'update'])->name('menus.update');

        // Pages
        Route::resource('pages', PageController::class);

        // Portfolios
        Route::resource('portfolios', PortfolioController::class);
    });
});
