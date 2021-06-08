<?php

namespace App\Models;

use Akaunting\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'name',
        'email',
        'phone',
        'room_ordered',
        'check_in',
        'check_out',
        'totalprice',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function convertedPrice($price)
    {
        return Money::IDR($price, true);
    }
}
