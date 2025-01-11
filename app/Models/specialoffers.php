<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOffers extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_item_id',
        'discount',
        'start_date',
        'end_date',
    ];

    // If you want to establish a relationship with the MenuItem model
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}

