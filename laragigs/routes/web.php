<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

Route::get('/listings/{listing}', [ListingController::class, 'show'])->middleware('auth');

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/manage', [ListingController::class, 'manage'])->middleware('auth');

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/auth', [UserController::class, 'auth']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
