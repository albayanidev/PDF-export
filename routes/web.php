<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Volt::route('pages/input', 'pages.input')->name('pages.input');
    Volt::route('pages/first', 'pages.first')->name('pages.first');
    Volt::route('pages/second', 'pages.second')->name('pages.second');
    Volt::route('pages/third', 'pages.third')->name('pages.third');
    Volt::route('pages/fourth', 'pages.fourth')->name('pages.fourth');
    Volt::route('pages/fifth', 'pages.fifth')->name('pages.fifth');
    Volt::route('pages/sixth', 'pages.sixth')->name('pages.sixth');
});

Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
