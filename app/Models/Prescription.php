<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsto(Patient::class);
    }

    public function treatments()
    {
        return $this->belongstomany(Treatment::class, 'prescription_treatment');
    }

    public function MedicalTests()
    {
        return $this->belongstomany(MedicalTest::class, 'prescription_medical_test');
    }

    public function doctor()
    {
        return $this->belongsto(Doctor::class);
    }
}
