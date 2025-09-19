<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCard extends Model
{
    use HasFactory;

    protected $fillable = [
        // Personal Information
        'date',
        'name',
        'date_of_birth',
        'age',
        'gender',
        'civil_status',

    ];

    public function professionalInformation()
    {
        return $this->hasOne(ProfessionalInformation::class);
    }

    public function familyHistory()
    {
        return $this->hasOne(FamilyHistory::class);
    }

    public function pastMedicalHistory()
    {
        return $this->hasOne(PastMedicalHistory::class);
    }

    public function lastTaken()
    {
        return $this->hasOne(LastTaken::class);
    }

    public function socialHistory()
    {
        return $this->hasOne(SocialHistory::class);
    }

    public function obgynHistory()
    {
        return $this->hasOne(OBGYNHistory::class);
    }

    public function malePersonnel()
    {
        return $this->hasOne(MalePersonnel::class);
    }

    public function presentHealthStatus()
    {
        return $this->hasOne(PresentHealthStatus::class);
    }

    public function ctrs()
    {
        return $this->hasMany(CTR::class);
    }
}
