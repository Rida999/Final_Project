<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\stores;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'rating',
        'review_text'
    ];

    /**
     * Get the user that wrote the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the store that was reviewed.
     */
    public function store()
    {
        return $this->belongsTo(stores::class);  // Now Store is correctly referenced
    }
    public function edit($id)
    {
        $review = Reviews::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

}