<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// All listings
Route::get('/', [ListingController::class, 'index'])->name('listings');

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');

// Store Listing Data
Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
