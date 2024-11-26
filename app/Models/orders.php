<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = [
        'user_id',
        'order_status_id',
        'payment_status_id',
        'delivery_address_id',
        'total',
    ];

    // Define relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    public function delivery_address()
    {
        return $this->belongsTo(Addresses::class);
    }
    public function city()
    {
        return $this->belongsTo(cities::class, 'city_id');
    }

}
