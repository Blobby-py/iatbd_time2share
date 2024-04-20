<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

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

// Show Register Form
Route::get("/register", [UserController::class, "create"]);

//Create new userf
Route::post("/users", [UserController::class, "store"]);

// Logout
Route::post("/logout", [UserController::class, "logout"]);

// Login
Route::get("login", [UserController::class, "login"]);

// LoginUser
Route::post("/users/authenticate", [UserController::class, "authenticate"]);

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

