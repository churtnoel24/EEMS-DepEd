<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FamilyHistory extends Model
{
    use HasFactory;

    protected $fillable =[
        // Family History
        'family_history_hypertension',
        'family_history_hypertension_relationship',
        'family_history_cardiovascular_disease',
        'family_history_cardiovascular_disease_relationship',
        'family_history_diabetes_mellitus',
        'family_history_diabetes_mellitus_relationship',
        'family_history_kidney_disease',
        'family_history_kidney_disease_relationship',
        'family_history_cancer',
        'family_history_cancer_relationship',
        'family_history_asthma',
        'family_history_asthma_relationship',
        'family_history_allergy',
        'family_history_allergy_relationship',

        'other_remarks',
    ];

    public function healthCard(){
        return $this->belongsTo(HealthCard::class);
    }

}
