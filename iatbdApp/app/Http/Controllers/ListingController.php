<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{

    // Show all listings
    public function index(Request $request) {
        // dd(request("tag"));
        return view('listings.index', [
            "listings" => Listing::latest()->filter(request(["tag", "search"]))->get()
        ]);
    }

    // Show specific listing
    public function show(Listing $listing) {
        return view("listings.show", [
            "listing" => $listing
        ]);
    }

    // Show create form
    public function create() {
        return view(
            'listings.create'
        );
    }

    // Store product data
    public function store(Request $request) {
        dd($request->all());
    }
}
