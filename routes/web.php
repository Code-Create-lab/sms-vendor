<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('channel', function () {
    return view('channel');
})->name('channel');
