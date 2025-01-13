<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Reviews;
use App\Models\Stores;
use App\Models\User;
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

    public function showMenu($restaurant_id)
    {
        $restaurant = \App\Models\Stores::findOrFail($restaurant_id);

        $menus = \App\Models\Menus::where('store_id', $restaurant_id)->get();

        $reviews = Reviews::where('store_id',$restaurant_id)->get();

        $stores = Stores::all();
            
        return view('pages.ui.menu', compact('reviews', 'stores', 'menus','restaurant'));
    }

    public function storeReview(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|min:10',
        ]);

        // Check if user exists with the provided email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'This email does not exist in our records. Please use a registered email address.')
                ->withInput();
        }

        // Create the review with the user's ID
        Reviews::create([
            'user_id' => $user->id,
            'store_id' => $request->store_id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}
