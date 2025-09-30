<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentalCard extends Model
{
    protected $fillable = [
        'health_card_id',
        'region',
        'division',
        'district',
        'school',
        'designation',
    ];


    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
