<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffers; // Ensure the model is imported
use Illuminate\Http\Request; // Import the Request class

class SpecialOffersController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $specialOffers = SpecialOffers::all();
        return $specialOffers;
        return view('special_offers.index', compact('specialOffers'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('special_offers.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount_percentage' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        SpecialOffers::create($request->all());
        return redirect()->route('special_offers.index')->with('success', 'Special offer created successfully.');
    }


    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'discount_percentage' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $specialOffer = SpecialOffers::findOrFail($id);
        $specialOffer->update($request->all());

        return redirect()->route('special_offers.index')->with('success', 'Special offer updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $specialOffer = SpecialOffers::findOrFail($id);
        $specialOffer->delete();

        return redirect()->route('special_offers.index')->with('success', 'Special offer deleted successfully.');
    }
}


