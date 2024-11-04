<?php

namespace App\Http\Controllers;
use App\Models\menus;

class MenusController extends Controller
{
    public function index()
    {
        $menus = menus::all();
        //return $menus;
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

        $menu = menus::create($request->all());
        // Handle media upload if needed
        return redirect()->route('menus.index');
    }

    // Implement update and delete methods similarly
}
