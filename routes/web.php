<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('front/home');
})->name('home');
Route::get('/home/index', [ApplicationController::class,'index'])->name('home.index');
Route::post('/home/store', [ApplicationController::class,'store'])->name('home.store');

