<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Prescriptions()
    {
        return $this->belongstomany(Prescription::class, 'prescription_medical_test');
    }
}
