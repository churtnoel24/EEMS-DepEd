<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialHistory extends Model
{
    protected $fillable = [
        // Social History
        'smoking',
        'smoking_age_started',
        'smoking_sticks_pack_per_day',
        'smoking_pack_per_year',
        'alcohol',
        'alcohol_how_often',
        'food_preference',
    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
