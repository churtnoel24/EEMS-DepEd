<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PastMedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        // Past Medical History
        'past_medical_history_hypertension',
        'past_medical_history_asthma',
        'past_medical_history_diabetes_mellitus',
        'past_medical_history_cardiovascular_disease',
        'has_allergy',
        'past_medical_history_allergy',
        'past_medical_history_tuberculosis',
        'had_surgery',
        'past_medical_history_surgery',
        'yellowish_discoloration_of_skin_selera',
        'had_been_hospitalized',
        'past_medical_history_hospitalization',
        'past_medical_history_others',
    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
