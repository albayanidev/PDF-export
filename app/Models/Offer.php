<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'quantity',
        'quantity_written',
        'measurement',
        'price',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
