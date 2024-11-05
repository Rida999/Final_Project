<?php

namespace App\Models;

use \Spatie\MediaLibrary\HasMedia;
use \Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menus extends Model
{
    // Table name (optional if it's not the default name based on class)
    protected $table = 'menus';

    // Mass assignable fields
    protected $fillable = [
        'store_id',
        'name',
        'description',
        'image', // This will store the image path if you're using the Spatie media library
        'created_at',
        'updated_at'
    ];

    /**
     * Register media collections for Spatie's Media Library.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
             ->singleFile(); // Ensures only one image per menu item; remove this line if you want multiple images
    }
}
