<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Models\stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create()
    {
        $stores = stores::all();
        $reviews = Reviews::with(['user', 'store'])->latest()->paginate(10);
        return view('Reviews', compact('stores', 'reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|min:10',
        ]);

        Reviews::create([
            'user_id' => 1,
            'store_id' => $request->store_id,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return redirect()->back()->with('success', 'Review created successfully.');
    }

    public function index()
    {
        $stores = stores::all();
        $reviews = Reviews::with(['user', 'store'])->latest()->paginate(10);
        return view('Reviews', compact('stores', 'reviews'));
    }
    public function edit($id)
    {
        $review = Reviews::findOrFail($id);
        $stores = stores::all();
        return view('EditReviews', compact('review', 'stores'));
    }
    
    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->route('list.reviews')->with('success', 'Review deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string|min:10',
        ]);

        $review = Reviews::findOrFail($id);
        $review->store_id = $request->store_id;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;
        $review->save();

        return redirect()->route('list.reviews')->with('success', 'Review updated successfully.');
    }
}


