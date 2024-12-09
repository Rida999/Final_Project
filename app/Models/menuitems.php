<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    use HasFactory;

    // Table name (optional if it's not the default name based on class)
    protected $table = 'menu_items';

    // Mass assignable fields
    protected $fillable = [
        'menu_id',
        'name',
        'description',
        'price',
        'category',
        'image', // This will store the image path
        'created_at',
        'updated_at',
    ];

    /**
     * Define relationship with Menus
     */
    public function menu()
    {
        return $this->belongsTo(Menus::class);
    }
}

