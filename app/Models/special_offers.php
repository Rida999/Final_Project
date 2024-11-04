<?php

namespace App\Models;
// Use Spatie's Medialibrary for image uploads
use \Spatie\MediaLibrary\HasMedia;
use \Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//dont forget to match the name with the file name (remove _);

class SpecialOffers extends Model
{
    protected $fillable = ['name', 'description', 'discount_percentage', 'start_date', 'end_date'];
}
