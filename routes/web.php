<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Landing;
use App\Livewire\Services;
use App\Livewire\Portfolio;
use App\Livewire\Contact;
use App\Livewire\ServiceDetail;
use App\Livewire\PortfolioDetail;

Route::get('/', Landing::class)->name('landing');
Route::get('/services', Services::class)->name('services');
Route::get('/portfolio', Portfolio::class)->name('portfolio');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/services/{service}', ServiceDetail::class)->name('service.detail');
Route::get('/portfolio/{project}', PortfolioDetail::class)->name('portfolio.detail');
