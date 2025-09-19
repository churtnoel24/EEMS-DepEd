<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentHealthStatus extends Model
{
    protected $fillable = [
         // Present Health Status
        'present_health_status_cough',
        'present_health_status_dizziness',
        'present_health_status_dyspnea',
        'present_health_status_chest_back_pain',
        'present_health_status_easy_fatigability',
        'present_health_status_joint_extremity_pains',
        'present_health_status_blurring_of_vision',
        'present_health_status_wearing_eyeglasses',
        'present_health_status_vaginal_discharge_bleeding',
        'present_health_status_dental_status',
        'present_health_status_present_medications_taken',
        'present_health_status_lumps',
        'present_health_status_painful_urination',
        'present_health_status_poor_loss_of_hearing',
        'present_health_status_syncope_fainting',
        'present_health_status_convulsions',
        'present_health_status_malaria',
        'present_health_status_goiter',
        'present_health_status_anemia',
        'present_health_status_others',
    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
