<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('channel', function () {
    return view('channel');
})->name('channel');


Route::get('industry-solution', function () {
    return view('industry-solution');
})->name('industry-solution');


Route::get('election-campaign', function () {
    return view('election-campaign');
})->name('election-campaign');


Route::get('about-us', function () {
    return view('about');
})->name('about');


Route::get('contact', function () {
    return view('contact');
})->name('contact');


Livewire::setScriptRoute(function($handle) {
    return Route::get('/'. env('FILAMENT_PATH') . '/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function($handle) {
    return Route::get('/' . env('FILAMENT_PATH') . '/livewire/update', $handle);
});

