<?php

namespace App\Http\Controllers;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menus::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules
        ]);

        $menu = Menus::create($request->all());
        // Handle media upload if needed
        return redirect()->route('menus.index');
    }

    // Implement update and delete methods similarly
}
