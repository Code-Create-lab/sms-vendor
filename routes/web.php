<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('channel', function () {
    return view('channel');
})->name('channel');


// One page per product / industry, driven by config/products.php and
// config/industries.php. whereIn() keeps unknown slugs a plain 404.
Route::get('products/{slug}', function (string $slug) {
    return view('product', ['slug' => $slug, 'product' => config("products.$slug")]);
})->whereIn('slug', array_keys(config('products')))->name('product');


Route::get('solutions/{slug}', function (string $slug) {
    return view('industry', ['slug' => $slug, 'industry' => config("industries.$slug")]);
})->whereIn('slug', array_keys(config('industries')))->name('industry');


Route::get('industry-solution', function () {
    return view('industry-solution');
})->name('industry-solution');


Route::get('election-campaign', function () {
    return view('election-campaign');
})->name('election-campaign');


Route::get('about-us', function () {
    return view('about');
})->name('about');


Route::get('dlt-registration', function () {
    return view('dlt-registration');
})->name('dlt-registration');


Route::get('contact', function () {
    return view('contact');
})->name('contact');


// Legal and utility pages linked from the footer bottom bar.
Route::view('terms', 'legal.terms')->name('terms');
Route::view('privacy', 'legal.privacy')->name('privacy');
Route::view('legal-notices', 'legal.legal-notices')->name('legal-notices');
Route::view('faqs', 'legal.faqs')->name('faqs');
Route::view('sitemap', 'legal.sitemap')->name('sitemap');


Livewire::setScriptRoute(function($handle) {
    return Route::get('/'. env('FILAMENT_PATH') . '/livewire/livewire.js', $handle);
});

// Livewire POSTs component updates to this endpoint, so it must be registered
// as POST — as Route::get it answered 405 and every component interaction
// (contact form chips, validation and submit) silently failed.
Livewire::setUpdateRoute(function($handle) {
    return Route::post('/' . env('FILAMENT_PATH') . '/livewire/update', $handle);
});

