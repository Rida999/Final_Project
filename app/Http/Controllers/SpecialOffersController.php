<?php

namespace App\Http\Controllers;

class SpecialOffersController extends Controller
{
    public function index()
    {
        $specialOffers = SpecialOffers::all();
        return view('special_offers.index', compact('specialOffers'));
    }

    public function create()
    {
        return view('special_offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount_percentage' => 'required|numeric',
            // Add other validation rules
        ]);

        SpecialOffers::create($request->all());
        return redirect()->route('special_offers.index');
    }

    // Implement update and delete methods similarly
}

