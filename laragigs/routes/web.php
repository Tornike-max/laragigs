<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest listing',
        'listings' => Listing::all(),
    ]);
});
