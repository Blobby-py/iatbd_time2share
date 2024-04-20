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
    public function store(Request $request, Listing $listing) {

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

        $formField["user_id"] = auth()->id();

        Listing::create($formField);

        return back()->with('message', 'Product Upload Succesfull!');
    }

    // ShowEdit Form
    public function edit(Listing $listing) {
        return view("listings.edit", ["listing" => $listing]);
    }

    // Update product data
    public function update(Request $request, Listing $listing) {
        $formField = $request->validate([
            "title" => "required",  // Title of product
            "product" => "required",  // Name of product
            "location" => "required",  // Location of product
            "email" => ["required", "email"],  // Email of seller
            "tags" => "required",  // ["required", Rule::unique("listings", "tags")],  // Product tags
            "description" => "required"  // Description of product
        ]);

        $listing->update($formField);

        if($request->hasFile('logo')) {
            $formField['logo'] = $request->file('logo')->store('logos', 'public');
        }

        return back()->with("message", "Product Edited Succesfully");
    }

    // Destrouy product
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect("/")->with("message", "Product succesfully deleted");
    }
}
