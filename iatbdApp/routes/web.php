<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, "index"]);

// Show the create page
Route::get('/listings/create', [ListingController::class, "create"]);

// Store new listing data
Route::post("/listings", [ListingController::class, "store"]);

//Show Edit Form
Route::get("listings/{listing}/edit", [ListingController::class, "edit"]);

// Submit Edit update
Route::put("listings/{listing}", [ListingController::class, "update"]);

// Delete
Route::delete("listings/{listing}", [ListingController::class, "destroy"]);

// Show single listing
Route::get('/listings/{listing}', [ListingController::class, "show"]);


// Route::get("/listings/{listing})", function(Listing $listing) {
//     return view("listing", [
//         "listing" => $listing
//     ]);
// });

// Route::get("/listings/{id}", function($id) {
//     return view("listing", [
//         "listing" => Listing::find($id)
//     ]);
// });

