<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LastTaken extends Model
{
    use HasFactory;

    protected $fillable = [
        // Last Taken
        'last_taken_cxr_sputum_date',
        'last_taken_cxr_sputum_result',
        'last_taken_ecg_date',
        'last_taken_ecg_result',
        'last_taken_urinalysis_date',
        'last_taken_urinalysis_result',
        'last_taken_drug_test_date',
        'last_taken_drug_test_result',
        'last_taken_neuro_exam_date',
        'last_taken_neuro_exam_result',
        'last_taken_bloodtyping_date',
        'last_taken_bloodtyping_result',
        'last_taken_others',
    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
