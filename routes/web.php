<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/profile',function (){
   return 'Saya A Fahri Putra Pratama';
});

Route::get('/cart',function (){
   return 'Ini adalah halaman Keranjang';
});

Route::get('/contact',function (){
   return 'Ini adalah halaman Kontak';
});

Route::get('/product',function (){
   return 'Ini adalah halaman Produk';
});

Route::get('/coba',function (){
   return 'HELLO WORLD';
});

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
});

require __DIR__.'/auth.php';
