<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $menus = Menus::paginate(10); 
        return view('pages.menus.Index', compact('menus'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('pages.menus.AddItem');
    }

    // Store a newly created resource in storage
    public function store(Request $request) //kamen mabede yeha bas bede index
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menuData = $request->all();
        $menuData['store_id'] = 1; // Set the store_id to 1 by default

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $menuData['image'] = $request->file('image')->store('images', 'public');
        }

        Menus::create($menuData);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
{
    $menu = Menus::findOrFail($id);
    return view('pages.menus.EditItem', compact('menu'));
}


    // Update the specified resource in storage
    public function update(Request $request, $id) // i need update and delete
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menus::findOrFail($id);
        $menuData = $request->except(['_token', '_method']);

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

    public function show($id)
    {
        
    }
}
