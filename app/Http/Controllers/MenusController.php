<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $menus = Menus::all();
        return view('blank.List', compact('menus'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('blank.Add');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menuData = $request->all();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $menuData['image'] = $request->file('image')->store('images', 'public');
        }

        Menus::create($menuData);
        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menus::findOrFail($id);
        $menuData = $request->all();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $menuData['image'] = $request->file('image')->store('images', 'public');
        }

        $menu->update($menuData);
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
