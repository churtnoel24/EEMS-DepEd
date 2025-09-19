<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObGynHistory extends Model
{
    protected $fillable = [
        // OB-GYN History
        'menarche',
        'cycle',
        'duration',
        'ob_gyn_parity',
        'papsmear_done',
        'papsmear_date',
        'self_breast_exam_done',
        'mass_noted',
        'mass_location',
    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
