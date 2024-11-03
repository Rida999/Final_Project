<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = ['name', 'description', 'price', 'category', 'nutritional_facts'];

    // Use Spatie's Medialibrary for image uploads
    use \Spatie\MediaLibrary\HasMedia;
    use \Spatie\MediaLibrary\InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }
}

