<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return view('listing.index', [
            'listings' => Listing::latest()->filter(request(['tag']))->get(),
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listing.show', [
            'listing' => $listing,
        ]);
    }
}