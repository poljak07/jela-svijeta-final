<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $requestParams = ['tag', 'category', 'search', 'per_page', 'page', 'with'];

        if (!isset($perPage) OR empty($perPage) OR $perPage == "all") {
            return redirect()->route('listings');
        }

        $listings = Listing::filter( request($requestParams) )->orderBy('created_at', 'DESC');
        $listings = $listings->paginate($perPage)->withQueryString();
          return view('listings.index', compact('listings'));
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }


    // Show Create form
    public function create()
    {
        return view('listings.create');
    }


    //Store Listing Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title:en' => ['required', 'unique:listings_translations,title'],
            'title:hr' => ['required', 'unique:listings_translations,title'],
            'title:de' => ['required', 'unique:listings_translations,title'],

            'category' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields); //

        return redirect()->route('listings')->with('message', 'Listing created successfully!');
    }
}
