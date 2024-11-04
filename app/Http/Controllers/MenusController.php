<?php

namespace App\Http\Controllers;

use App\Models\Menus; // Ensure the model is named with the correct casing
use Illuminate\Http\Request; // Import the Request class

class MenusController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $menus = menus::all();
        return $menus;
        return view('menus.index', compact('menus'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('menus.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        Menus::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }


    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $menu = Menus::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $menu = Menus::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }
}
