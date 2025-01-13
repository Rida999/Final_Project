<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantOwnerController extends Controller
{
    public function dashboard()
    {
        return view('restaurant_owner.dashboard');
    }

    public function store()
    {
        // Add logic to fetch and display the restaurant owner's store
        return view('restaurant_owner.store');
    }
}
