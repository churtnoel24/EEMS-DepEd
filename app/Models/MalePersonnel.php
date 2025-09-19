<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MalePersonnel extends Model
{
    protected $fillable = [
        // Male Personnel
        'digital_rectal_exam_done',
        'digital_rectal_exam_date',
        'digital_rectal_exam_result',

    ];

    public function healthCard()
    {
        return $this->belongsTo(HealthCard::class);
    }
}
