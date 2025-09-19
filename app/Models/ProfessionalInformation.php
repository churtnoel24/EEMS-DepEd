<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfessionalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        // Professional Information
        'school_district_division',
        'position_designation',
        'first_year_in_service',
        'years_in_service',
    ];

    public function healthCard(){
        return $this->belongsTo(HealthCard::class);
    }
}
