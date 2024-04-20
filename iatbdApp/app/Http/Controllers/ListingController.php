<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    // Show all listings
    public function index(Request $request) {
        // dd(request("tag"));
        return view('listings.index', [
            "listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(8)
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
        $formField = $request->validate([
            "title" => "required",  // Title of product
            "product" => "required",  // Name of product
            "location" => "required",  // Location of product
            "email" => ["required", "email"],  // Email of seller
            "tags" => "required",  // ["required", Rule::unique("listings", "tags")],  // Product tags
            "description" => "required"  // Description of product
        ]);

        if($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formField);

        return redirect("/")->with("message", "Product Upload Succesfull");
    }
}
