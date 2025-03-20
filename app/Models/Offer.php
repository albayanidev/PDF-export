<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'custom',
        'written_in_price',
        'sizewater',
        'price',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
