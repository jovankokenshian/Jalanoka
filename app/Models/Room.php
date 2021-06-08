<?php

namespace App\Models;

use Akaunting\Money\Money;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'room_total',
        'facility',
        'room_image'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function convertedPrice($price)
    {
        return Money::IDR($price, true);
    }
}
