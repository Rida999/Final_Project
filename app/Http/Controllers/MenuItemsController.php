<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $menuItems = MenuItems::paginate(10); 
        return view('pages.menuItems.Index', compact('menuItems'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('pages.menuItems.AddItem');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menuItemData = $request->all();
        $menuItemData['menu_id'] = 37;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $menuItemData['image'] = $request->file('image')->store('menu_items', 'public');
        }

        MenuItems::create($menuItemData);

        return redirect()->route('menu_items.index')->with('success', 'Menu item created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $menuItem = MenuItems::findOrFail($id);
        return view('pages.menuItems.EditItem', compact('menuItem'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menuItem = MenuItems::findOrFail($id);
        $menuItemData = $request->except(['_token', '_method']);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $menuItemData['image'] = $request->file('image')->store('menu_items', 'public');
        }

        $menuItem->update($menuItemData);

        return redirect()->route('menu_items.index')->with('success', 'Menu item updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $menuItem = MenuItems::findOrFail($id);
        $menuItem->delete();

        return redirect()->route('menu_items.index')->with('success', 'Menu item deleted successfully.');
    }

    public function show($id)
    {
        // Optional: implement if needed
    }
}
