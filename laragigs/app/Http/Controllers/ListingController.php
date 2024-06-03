<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listing.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    public function show(Listing $listing)
    {
        if (isset($listing)) {
            return view('listing.show', [
                'listing' => $listing,
            ]);
        } else {
            Response('No Listing Provided', 500);
        }
    }

    public function create()
    {
        return view('listing.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $data['user_id'] = auth()->id();

        Listing::create($data);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listing.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $data = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($data);

        return redirect('/')->with('message', 'Listing updated successfully');
    }


    public function destroy(Listing $listing)
    {
        if (!$listing->id) {
            Response("No Id Provided!");
        }

        $listing->delete($listing->id);
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        return view('listing.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
