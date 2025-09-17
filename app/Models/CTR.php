<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTR extends Model
{
    use HasFactory;

    protected $table = 'ctrs';


    protected $fillable = [
        'health_card_id',
        'consultation_date',
        'symptoms',
        'diagnosis',
        'treatment',
    ];

    // Relationship: CTR belongs to 1 HealthCard
    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
