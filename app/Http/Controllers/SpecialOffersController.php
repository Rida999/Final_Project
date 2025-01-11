<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffers;
use Illuminate\Http\Request;

class SpecialOffersController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $specialOffers = SpecialOffers::paginate(10); // Adjust the number per page
        return view('pages.SpecialOffers.Index', compact('specialOffers'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('pages.SpecialOffers.AddItem'); // No need to pass menu items as dropdown is not needed
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        SpecialOffers::create([
            'menu_item_id' => 1, // Set menu_item_id to 1
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('special_offers.index')->with('success', 'Special offer created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        // Find the offer by ID
        $specialOffer = SpecialOffers::findOrFail($id);

        // Return the view with the special offer data
        return view('pages.SpecialOffers.EditItem', compact('specialOffer'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $specialOffer = SpecialOffers::findOrFail($id);
        $specialOffer->update([
            'menu_item_id' => 1, // Set menu_item_id to 1
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('special_offers.index')->with('success', 'Special offer updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $specialOffer = SpecialOffers::findOrFail($id);
        $specialOffer->delete();

        return redirect()->route('special_offers.index')->with('success', 'Special offer deleted successfully.');
    }

    public function show($id)
    {

    }
}
