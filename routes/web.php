<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Rehoboth Cleaning Web Routes
|--------------------------------------------------------------------------
*/

// --- Public Home Page ---
Route::get('/', function () {
    return view('welcome'); // The complete page generated in the previous step
})->name('home');

// --- Dynamic Service Pages ---
// This handles all 9 services (e.g., /services/medical-grade-cleaning)
Route::get('/services/{service:slug}', [PageController::class, 'service'])
    ->name('service.show');

// --- Location & Regional Hubs ---
// Lists all Canadian service areas
Route::get('/locations', [LocationController::class, 'index'])
    ->name('locations.index');

// Individual city pages (e.g., /locations/toronto)
Route::get('/locations/{location:slug}', [LocationController::class, 'show'])
    ->name('location.show');

// --- Static Informational Pages ---
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/franchise', 'pages.franchise')->name('franchise');

// --- WhatsApp Bot Webhook ---
// Note: This must be excluded from CSRF protection in VerifyCsrfToken.php
Route::post('/whatsapp/webhook', [WhatsAppController::class, 'handle'])
    ->name('whatsapp.webhook');

// --- Thank You / Success Page ---
Route::view('/quote-success', 'pages.thanks')->name('quote.success');
Route::get('/quote', \App\Livewire\QuoteWizard::class)->name('quote');