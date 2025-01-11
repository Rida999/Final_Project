<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews; // Import the Reviews model

class ListReviewsController extends Controller
{
    public function index()
    {
        // Fetch all reviews with their associated stores
        $reviews = Reviews::with('store')->latest()->paginate(10);

        // Pass the data to the ListReviews view
        return view('ListReviews', compact('reviews'));
    }
}
